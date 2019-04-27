<?php
 session_start();
 if(count($_SESSION) == 0)
     header("Location:login.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon.ico">

    <title>CourtCal</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>

</head>

<body>
  <p align="right" style="margin-right: 15px; margin-top: 5px background:black; "> 
    <a class="btn btn-next btn-fill btn-success btn-wd" href="logout.php">Logout</a>
    </p>
    <div class="image-container set-full-height" style="background-image: url('assets/img/#')">
        <!--   Creative Tim Branding   -->
        <a href="http://creative-tim.com">
             <div class="logo-container">

                <!-- <div class="logo">
                    <img src="assets/img/new_logo.png">
                </div>
                <div class="brand">
                    Creative Tim
                </div> -->
            </div>
        </a>

        <!--  Made With Material Kit  -->
        <!-- <a href="http://demos.creative-tim.com/material-kit/index.html?ref=material-bootstrap-wizard" class="made-with-mk">
            <div class="brand">MK</div>
            <div class="made-with">Made with <strong>Material Kit</strong></div>
        </a>
 -->
       <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="green" id="wizardProfile">
                        <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                            <div class="wizard-header">
                                <h3 class="wizard-title">
                                   Police Home
                                </h3>
                                 
                                 <a class="btn btn-next btn-fill btn-success btn-wd" href="logout.php">Logout</a>
                                    
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#station" data-toggle="tab">FOLLOWING OPTIONS</a></li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="station">
                                    <div class="row">
                                        <h4 class="info-text">Police ID: <?php echo $_SESSION['gen_id'];?></h4>

                                         <div class="col-sm-9 col-sm-offset-1">
                                            <div class="form-group label-floating"><br/>
                                                <hr style="border-bottom: 2px solid gray;">
                                                    <a href="FIR_Form.php">
                                                        <input type='submit' class='btn btn-fill btn-success' style="color: white; float: right;" value='REGISTER F.I.R'>
                                                    </a>
                                                <p style="font-weight: bold; font-style: oblique; color: darkgray; font-size: 20px; ">Registration of F.I.R.</p>
                                                <hr style="border-bottom: 2px solid green;">
                                            </div>
                                        </div>
                                        <!-- -->
                                         <div class="col-sm-9 col-sm-offset-1">
                                            <div class="form-group label-floating"><br/>
                                                <hr style="border-top: 2px solid gray;">
                                                    <a href="Case_status.php">
                                                        <input type='submit' class='btn btn-fill btn-success' style="color: white; float: right;" value='Case Status'>
                                                    </a>
                                                <p style="font-weight: bold; font-style: oblique; color: darkgray; font-size: 20px; ">F.I.R accepted by Judge.</p>
                                                <hr style="border-bottom: 2px solid green;">
                                            </div>
                                        </div>
                                    
                                         <div class="col-sm-9 col-sm-offset-1">
                                            <div class="form-group label-floating"><br/>
                                                <hr style="border-bottom: 2px solid gray; ">
                                                    <a href="all_case.php">
                                                        <input type='submit' class='btn btn-fill btn-success' style="color: white; float: right;" value='VIEW ALL CASES'>
                                                    </a>
                                                <p style="font-weight: bold; font-style: oblique; color: darkgray; font-size: 20px; ">View all F.I.R & charge sheet.</p>
                                                <hr style="border-bottom: 2px solid green;">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->
        </div> <!--  big container --> 


</body>
    <!--   Core JS Files   -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="assets/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
    <script src="assets/js/jquery.validate.min.js"></script>

</html>
