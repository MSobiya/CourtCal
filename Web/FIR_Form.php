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
</head>

<body>
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
                <div class="col-sm-8 col-sm-offset-2">
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="red" id="wizardProfile">
                            <form action="Connectivity.php" method="post">
                        <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                       First Information Report (FIR)
                                    </h3>
                                    <h5>This information will generate FIR.</h5>
                                     
                                     <a class="btn btn-next btn-fill btn-success btn-wd" href="logout.php">Logout</a>
                                        
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#station" data-toggle="tab">Station Details</a></li>
                                        <li><a href="#complaitnant" data-toggle="tab">Complainant</a></li>
                                        <li><a href="#discription" data-toggle="tab">FIR Discription</a></li>

                                       
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="station">
                                        <div class="row">
                                            <h4 class="info-text">Station Information </h4>

                                             <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label for="nops" class="control-label"><b>Name of police station</b></label><br>
                                                        <input id="nops" type="text" name="nops" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label for="dsops" class="control-label"><b>District of police station</b></label><br>
                                                        <input id="dsops" type="text" name="dsops" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label for="pops" class="control-label"><b>Pin code of police station</b></label><br>
                                                        <input id="pops" type="text" name="pops" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label for="phn_ps" class="control-label"><b>landline number of police station</b></label><br>
                                                        <input id="phn_ps" type="text" name="phn_ps" class="form-control">
                                                </div>
                                            </div>
                                             

                                        </div>    
                                    </div>

                                    <div class="tab-pane" id="complaitnant">
                                        <h4 class="info-text">Complainant details</h4>
                                        <div class="row">

                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label for="xname" class="control-label"><b>Name of complainant</b></label><br>
                                                        <input id="xname" type="text" name="xname" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label for="xphn" class="control-label"><b>Complainant Contact Number</b></label><br>
                                                        <input id="xphn" type="text" name="xphn" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label for="xemail" class="control-label"><b>Email ID</b></label><br>
                                                        <input id="xemail" type="text" name="xemail" class="form-control">
                                                </div>
                                            </div>

                                            

                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label for="xaddress" class="control-label"><b>Address</b></label><br>
                                                        <textarea id="xaddress" type="text" name="xaddress" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>

                                            


                                        </div>
                                    </div>

                                    <div class="tab-pane" id="discription">
                                        <h4 class="info-text"> What is happened. (Details Description) </h4>
                                        <div class="row">

                                            <!--<div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label for="case_title" class="control-label"><b>Case Title</b></label><br>
                                                        <input id="case_title" type="text" name="case_title" class="form-control">
                                                </div>
                                            </div>-->

    
                                            <div class="col-sm-7 col-sm-offset-1">
                                               <div class="form-group label-floating">
                                                        <label for="case_desc" class="control-label"><b>Discription</b></label><br>
                                                        <textarea id="case_desc" type="text" name="case_desc" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    





                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
                                        <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='btn_fir' value='Finish' />
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->
        </div> <!--  big container -->

        <div class="footer">
            <!-- <div class="container text-center">
                 Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a>
            </div> -->
        </div>
    </div>

</body>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="assets/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
    <script src="assets/js/jquery.validate.min.js"></script>

</html>
