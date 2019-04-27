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
                        <div class="card wizard-card" data-color="green" id="wizardProfile">
                            <form action="Connectivity.php" method="post">
                        <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                       It is for Stenotypiet
                                    </h3>
                                    <h5>The report of court discussion.</h5>
                                    <a class="btn btn-success" href="logout.php">Logout</a>
                                </div>

                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#stenotpist" data-toggle="tab">Stenotypist</a></li>
                                       <!--  <li><a class="btn btn-next btn-fill btn-success btn-wd" href="logout.php">Logout</a></li -->
                                        
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="stenotpist">
                                      <div class="row">
                                            <h4 class="info-text"> Welcome to Stenotyper</h4>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="material-icons">email</i> -->
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label for="start_of_hearing_time"><h2><b>Start Time Of Hearing : </b></h2><h3><?php echo date('Y-m-d H:i:s');?></h3></label>
                                            
                                                        <input type="hidden" name="start_time" value="<?php echo date('Y-m-d H:i:s');?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"><h4><b>Case id:</b></h4></label><br>
                                                    <input type="text" class="form-control" name="case_id"></input> 
                                                </div>
                                            </div>

                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"><h4><b>Statements by judge:</b></h4></label><br>
                                                    <textarea type="text" class="form-control" name="judgement" rows="18"></textarea> 
                                                </div>
                                            </div>

                                            <!-- <div class="col-sm-10 col-sm-offset-1">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label for="end_of_hearing_time"><h2><b>End Time Of Hearing :</b></h2></label><br/>
                                                    </div>
                                                </div>
                                            </div> -->

                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <!-- <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' /> -->
                                        <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='btn_stenotypist' value='Finish' />
                                    </div>

                                    <div class="pull-left">
                                        <!-- <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' /> -->
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
