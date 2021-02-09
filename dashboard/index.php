<?php
session_start();

//This code is redirect to login.php if not signin the user
if(empty($_SESSION['userLogin']) || $_SESSION['userLogin'] == ''){
  header("Location: ../login/index.html");
  die();
}
//SESSION Timeout in 30 minutes
if( $_SESSION['last_activity'] < time()-$_SESSION['expire_time'] ) { //have we expired?
  //redirect to logout.php
  header('Location: ../login/logout.php'); //change yoursite.com to the name of you site!!
} else{ //if we haven't expired:
  $_SESSION['last_activity'] = time(); //this was the moment of last activity.
}
// Change this to your connection info.

//-----------------------------------------------------
// If the user is not logged in redirect to the login page...




require_once('connections/fetch_query_connection.php');
 
	
//----------------------------------------------------------------------
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    CPESMS - Student Management System Beta
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <!-- Customs Additional -->
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="assets/img/bg-cea.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <?php $active ='index';  include 'include/sidebar.php';?>
    <div class="main-panel">
                <!-- Navbar -->
                <?php include 'include/navbar.php';?>
                <!-- End Navbar -->
                <div class="content">
        <div class="container-fluid">
         
          <!-- Start tayo dito sa content-->
          <div class="row">

            <div class="row">
            <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">R-0 FORM</h5>
        <p class="card-text">If you are a student who did not enrolled during online enrollment with the valid reason. This form is can gather you information needed to enroll the subject that you want or need to enroll. After that, the Chairperson or the student assistant will be tag those subjects in the Academic Management System of the PUP.</p>
        <a href="r0-form.php" class="btn btn-warning">Proceed..</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Ace Form</h5>
        <p class="card-text">If you are officially enrolled during online enrollment but you need to add more subject or change from one subject to another. This form is can gather your information to add or change subject. After that, the Chairperson or the Student Assistant will be add or change that subject in the Academic Management System of the PUP. </p>
        <a href="ace-add.php" class="btn btn-warning">ADD</a>
        <a href="ace-change.php" class="btn btn-warning">CHANGE</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">OVERLOAD REQUEST</h5>
        <p class="card-text">If you are a student who want to overload your back subject/s in the previous semesters. By this form, the Chairperson can easily gather the information that needed to approve your overload form and add it into PUP Academic Management System.

</p>
        <a href="overload.php" class="btn btn-warning">Proceed..</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">OVERIDE REQUEST</h5>
        <p class="card-text">If you want to enroll two subjects that pre-requisite to each other at the same semester . This form is can easily help the chairperson to decide if he/she will be approved your override request. </p>
        <a href="override.php" class="btn btn-warning">Proceed..</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">ADDING OF SLOT</h5>
        <p class="card-text">If you are a student who need to reserve a slot in a certain subject. By this form, the Chairperson can easily gather the information that needed to approve your reservation of slot and reserve it into PUP Academic Management System. </p>
        <a href="addslot.php" class="btn btn-warning">Proceed..</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">ACCREDITATION FORM</h5>
        <p class="card-text">If you are a student who needs to accredit your subject from the other curriculum into your real curriculum. Through this form, the chairperson can easily gather the information needed and help you to accredit your subject and forward it to Admission Office.</p>
        <a href="accreditation.php" class="btn btn-warning">Proceed..</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">COMPLETION FORM</h5>
        <p class="card-text">If you are a student who have incomplete in the previous subject taken. Through this form, the chairperson is easily gather the information that needed to complete and change your grade status and forward it into registrar office. </p>
        <a href="completion.php" class="btn btn-warning">Proceed..</a>
      </div>
    </div>
  </div>































            </div>
      

      </div>
           <!-- end ng content-->
        </div>
      </div>
      <?php include 'include/footer.php';?>
  <!--   Core JS Files   -->
  <?php include 'assets/js/script.php';?>
</body>

</html>