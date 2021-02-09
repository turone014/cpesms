<?php
include 'connections/executecompletion.php';
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
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />
    <link href="assets/custom/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-wordpress-admin/wordpress-admin.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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
            <?php $active ='completion';  include 'include/sidebar.php';?>
            <div class="main-panel">
                <!-- Navbar -->
                <?php include 'include/navbar.php';?>
                <!-- End Navbar -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">

                        </div>
                        <!-- Start tayo dito sa content-->
                        <div class="d-sm-flex align-items-center" style="justify-content: flex-end;">
                            
                        <button onclick="window.open('https://drive.google.com/file/d/1kVNheaof9OEdtG_f342KGy6jauLec5IV/view?usp=sharing')" class="btn btn-info" type="submit" style="
    
    margin: 0.5%;
">Download Request Form</button>
<button onclick="window.open('https://drive.google.com/file/d/1kVNheaof9OEdtG_f342KGy6jauLec5IV/view?usp=sharing')" class="btn btn-info" type="submit" style="
    
    margin: 0.5%;
">Download Template Form</button>
</div>

                        <div class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header card-header-warning">
                                                <h4 class="card-title">Completion Form</h4>
                                                <p class="card-category">Please upload your form in PDF format.</p>
                                                
                                            </div>
                                            <div class="card-body">
                                            
                                                <form action="completion.php" id="myForm" method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label
                                                                    class="bmd-label-floating"><?php print_r($stdnumber); ?></label>
                                                                <input type="text" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label
                                                                    class="bmd-label-floating"><?php print_r($firstname); ?></label>
                                                                <input type="text" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label
                                                                    class="bmd-label-floating"><?php print_r($lastname); ?></label>
                                                                <input type="email" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div
                                                            class=" col-md-12 form-group form-file-upload form-file-multiple">
                                                            <input type="file" multiple="" name="myfile" id="customFile"
                                                                class="inputFileHidden">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control inputFileVisible"
                                                                    placeholder="Upload your Completion Form Here">
                                                                <span class="input-group-btn">
                                                                    <button type="button"
                                                                        class="btn btn-fab btn-round btn-warning">
                                                                        <i class="material-icons">attach_file</i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>



                                                    </div>
                                                






                                                    <button type="submit" class="btn btn-warning pull-right" id="savess"
                                                        name="savess"> Submit</button>


                                                </form>
                                            </div>
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
                <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js">
                </script>
            
               <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
             
                <script src="assets/js/file-inputs.js"></script>

                <script type="text/javascript">
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
                });
                </script>
              

            

              






</body>

</html>