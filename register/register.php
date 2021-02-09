<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'secretenemy1';
$DATABASE_NAME = 'cpe';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['firstname'], $_POST['midname'], $_POST['lastname'], $_POST['birthday'], $_POST['phonenumber'], $_POST['email'], $_POST['password'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['firstname']) || empty($_POST['midname']) || empty($_POST['lastname']) || empty($_POST['birthday']) || empty($_POST['phonenumber']) ||  empty($_POST['email']) || empty($_POST['password'])) {
	// One or more values are empty.
	exit('Please complete the registration form');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid!');
}

if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
    exit('Username is not valid!');
}

if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	exit('Password must be between 5 and 20 characters long!');
}

// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, password FROM cpe_students WHERE stdnumber = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		$outputs = '<h3>Student number exist, please recover your account by using forgot password</h3>';
	} else {
		// Username doesnt exists, insert new account
        if ($stmt = $con->prepare('INSERT INTO cpe_students (stdnumber, first_name, lastname, middlename, birthday, email, password, phonenumber, activation_code ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $uniqid = uniqid();
  $usernamess = $_POST['username'];
  $firstnames = $_POST['firstname'];
  $lastnames = $_POST['lastname'];
  $midnames = $_POST['midname'];
$stmt->bind_param('sssssssss', $usernamess, $firstnames, $lastnames, $midnames, $_POST['birthday'], $_POST['email'], $password, $_POST['phonenumber'], $uniqid);

	$stmt->execute();
	$from    = 'noreply@yourdomain.com';
$subject = 'Account Activation Required';
$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
$activate_link = 'http://localhost/cpe-sms/register/activate.php?email=' . $_POST['email'] . '&code=' . $uniqid;
$message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
mail($_POST['email'], $subject, $message, $headers);
$outputs = '<h3><center>Please check your email to activate your account!</h3></center>';
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Computer Engineering Department</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
     
         
          
          <div class="login-wrapper my-auto">
            <img src="../assets/images/puplogo.png" alt="..." "="" style="
    height: 107px;
    padding-left: 31px;
    padding-bottom: 6px;
">
<img src="../assets/images/cealogo.png" alt="..." "="" style="
    height: 107px;
    padding-left: 16px;
    padding-bottom: 6px;
"> 
     <?php echo $outputs ?>
           
   <a href="../login" class="btn btn-block login-btn" role="button" >Sign in</a>
   <a href="../forgot" class="forgot-password-link">Forgot password?</a>
           
          </div>
          
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="../assets/images/login.jpg" alt="login image" class="login-img">
        </div>
        
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
