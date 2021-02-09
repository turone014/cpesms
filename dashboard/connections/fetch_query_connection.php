<?php

require_once('../connection.php');

//-----------------------------------------------------
// If the user is not logged in redirect to the login page...

$users = $_SESSION['name'];
    $query = mysqli_query ($con, "SELECT * FROM cpe_students WHERE stdnumber = '$users' ");
    $row=mysqli_fetch_array($query);
	$firstname=$row["first_name"];
  $lastname=$row["lastname"];
  $middlename=$row["middlename"];
  $stdnumber=$row["stdnumber"];
  $id=$row["id"];
  ?>