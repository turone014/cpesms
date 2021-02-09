<?php

 session_start();

require_once('../connection.php');


	$users = $_SESSION["name"];
    $query = mysqli_query ($con, "SELECT * FROM cpe_students WHERE stdnumber = '$users' ");
    $row=mysqli_fetch_array($query);
    $stdnumber=$row["stdnumber"];
    $firstname=$row["first_name"];
    $middlename=$row["middlename"];
    $lastname=$row["lastname"];
    $id=$row["id"];


$sql = "SELECT * FROM oload_form_std";
$result = mysqli_query($con,$sql);
$files = mysqli_fetch_all($result,MYSQLI_ASSOC);



if(isset($_POST['savess']))
{

	$filename = $_FILES['myfile']['name'];
	$destination = '../uploads/' . $filename;
	$extension = pathinfo($filename,PATHINFO_EXTENSION);
	$file = $_FILES['myfile']['tmp_name'];
	$size = $_FILES['myfile']['size'];
	if(!in_array($extension,['zip','pdf','png']))
	{
	
		echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal.fire("Error","Your file extension must be .pdf format","error");';
  echo '}, 1000);</script>';

	}
	else if($_FILES['myfile']['size'] > 1000000000)
	{
		
		echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal.fire("Error","Your file is too large","error");';
  echo '}, 1000);</script>';
	}
	else {
		if(move_uploaded_file($file,$destination))
		{
			$sql = "INSERT INTO oload_form_std (studentnumber,name,size,idstd,std_name,std_middle,std_last,status_id) VALUES('$stdnumber', '$filename','$size','$id','$firstname','$middlename','$lastname',0)";

			if (mysqli_query($con,$sql))
			{
				echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal.fire("Success","This should review by Chairperson","success");';
  echo '}, 1000);</script>';
			}
			else{
				echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal.fire("Error","Please check your file again","error");';
  echo '}, 1000);</script>';
			}
		}
	}
}

if(isset($_GET['file_id']))
{
	$id = $_GET['file_id'];
	$sql = "SELECT * FROM oload_form_std WHERE id=$id";
	$result = mysqli_query($conn,$sql);
	$file = mysqli_fetch_assoc($result);
	$filepath = '../uploads/' . $file['name'];
	if(file_exists($filepath))
	{
		header('Content-Type: application/octet-stream');

		header ('Content-Description: File Transfer');
		header ('Content-Disposition: inline; filename=' . basename($filepath));

		header('Expires: 0');

		header('Cache-Control: must-revalidate');
		header('Pragma:public');

		header('Content-Length:' . filesize('../uploads/'.$file['name']));
		readfile('../uploads/' . $file['name']);

	
		exit;


	}
}