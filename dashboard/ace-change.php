<?php
session_start();
// Change this to your connection info.
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
            <?php $active ='ace-change';  include 'include/sidebar.php';?>
            <div class="main-panel">
                <!-- Navbar -->
                <?php include 'include/navbar.php';?>
                <!-- End Navbar -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">

                        </div>
                        <!-- Start tayo dito sa content-->

                        <div class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header card-header-warning">
                                                <h4 class="card-title">Ace Form (Change of Enrollment Form)</h4>
                                                <p class="card-category">Please fill up the following</p>
                                            </div>
                                            <div class="card-body">
                                                <form>
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


                                                        <div class="col-md-6 ">

                                                            <select class="selectpicker " id="sem"
                                                                data-style="btn btn-warning text-white btn-block "
                                                                required>
                                                                <option value="1" disabled selected>SEMESTER
                                                                </option>
                                                                <option value="First Semester">FIRST SEMESTER</option>
                                                                <option value="Second Semester">SECOND SEMESTER</option>
                                                                <option value="Summer Semester">SUMMER SEMESTER</option>
                                                            </select>
                                                        </div>


                                                        <div class="col-md-6" style="padding-bottom: 11px;">
                                                            <select class="selectpicker" id="acadyear"
                                                                data-style="btn btn-warning text-white btn-block"
                                                                required>
                                                                <option value="1" disabled selected>ACADEMIC YEAR
                                                                </option>
                                                                <option value="2018-2019">A.Y 2018-2019</option>
                                                                <option value="2019-2020">A.Y 2019-2020</option>
                                                                <option value="2020-2021">A.Y 2020-2021</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <p>Change From:</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">SUBJECT CODE:</label>
                                                                <input type="text" id="nscs" name="nsc"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">SUBJECT
                                                                    DESCRIPTION:</label>
                                                                <input type="text" id="nsds" name="nsd"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">SUBJECT COURSE, YEAR
                                                                    AND SECTION:</label>
                                                                <input type="text" id="nscyss" name="nscys"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">TIME</label>
                                                                <input type="text" class="form-control" id="ntimes"
                                                                    name="ntime" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">DAY</label>
                                                                <input type="text" class="form-control" name="nday"
                                                                    id="ndays" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select class="selectpicker"
                                                                data-style="btn btn-warning text-white" id="nunitss"
                                                                name="nunits" required>
                                                                <option value="11" disabled selected>UNITS
                                                                </option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <p>Change To:</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">SUBJECT CODE:</label>
                                                                <input type="text" id="1nscs" 
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">SUBJECT
                                                                    DESCRIPTION:</label>
                                                                <input type="text" id="1nsds" name="nsd"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">SUBJECT COURSE, YEAR
                                                                    AND SECTION:</label>
                                                                <input type="text" id="1nscyss" name="nscys"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">TIME</label>
                                                                <input type="text" class="form-control" id="1ntimes"
                                                                    name="ntime" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">DAY</label>
                                                                <input type="text" class="form-control" name="nday"
                                                                    id="1ndays" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select class="selectpicker"
                                                                data-style="btn btn-warning text-white" id="1nunitss"
                                                                name="nunits" required>
                                                                <option value="11" disabled selected>UNITS
                                                                </option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <button type="submit" class="btn btn-warning pull-right"
                                                        id="submits" name="submitr0"> Submit</button>


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
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                <script>
                $(document).ready(function() {
                    $('#sem option[value="1"]').hide();
                    $('#sem').selectpicker('refresh');
                });

                $(document).ready(function() {
                    $('#acadyear option[value="1"]').hide();
                    $('#acadyear').selectpicker('refresh');
                });

                $(document).ready(function() {
                    $('#nunitss option[value="11"]').hide();
                    $('#nunitss').selectpicker('refresh');
                });
                </script>

                <script type="text/javascript">
                $(function() {
                    $('#submits').click(function(e) {

                        var valid = this.form.checkValidity();
                        if (valid) {

                            var semester = $('#sem').val();
                            var acadyears = $('#acadyear').val();
                            var nsc = $('#nscs').val();
                            var nsd = $('#nsds').val();
                            var nscys = $('#nscyss').val();
                            var nday = $('#ndays').val();
                            var ntime = $('#ntimes').val();
                            var nunits = $('#nunitss').val();

                           
                            var pnsc = $('#1nscs').val();
                            var pnsd = $('#1nsds').val();
                            var pnscys = $('#1nscyss').val();
                            var pnday = $('#1ndays').val();
                            var pntime = $('#1ntimes').val();
                            var pnunits = $('#1nunitss').val();




                            e.preventDefault();

                            $.ajax({
                                type: 'POST',
                                url: 'connections/aceformchange.php',
                                data: {
                                    semester: semester,
                                    acadyears: acadyears,
                                    nsc: nsc,
                                    nsd: nsd,
                                    nscys: nscys,
                                    nday: nday,
                                    ntime: ntime,
                                    nunits: nunits,

                                  
                                    pnsc: pnsc,
                                    pnsd: pnsd,
                                    pnscys: pnscys,
                                    pnday: pnday,
                                    pntime: pntime,
                                    pnunits: pnunits
                                },
                                success: function(data) {
                                    Swal.fire({
                                        icon: 'success',
                                        'title': 'Successful',
                                        'text': 'Successfully Submitted',
                                        'type': 'success'

                                    }).then(function() {
                                        window.location = "index.php";
                                    });

                                },
                                error: function(data) {
                                    Swal.fire({
                                        icon: 'error',
                                        'title': 'error',
                                        'text': 'error saving data',
                                        'type': 'error'
                                    })

                                }


                            });


                        } else {

                        }




                    });


                });
                </script>







</body>

</html>