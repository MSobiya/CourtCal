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

<style>
table.form {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  border-style: black;
  width: 90%;
  font-weight: bold;
  border: 1px solid transparent;
}
td  , th {
  
  border: 1px solid #3C4858;
  text-align: center;
  padding: 8px;
  border-s
  font-weight: bold;
}
tr {
  background-color: white;
}

table.sub {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 85%;
  border: 1px;
}
</style>

</head>

<body>
 
    <p align="right" style="margin-right: 15px; margin-top: 5px background:black; "> 
    <a class="btn btn-next btn-fill btn-success btn-wd" href="Police.php">Home</a>
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
                                       Check Status To Proceed For Charge Sheet
                                    </h3>
                                    <h5>Next Step To Make Charge Sheet</h5>
                                        
                                      <!-- <a class="btn btn-next btn-fill btn-success btn-wd" href="logout.php">Logout</a> -->
                                        
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        
                                        <li><a href="#casestatus" data-toggle="tab">Case Status</a></li>
                                        <!-- <li><a href="#selectsections" data-toggle="tab">Apply Sections</a></li> -->

                                       
                                    </ul>
                                </div>

                                <div class="tab-content">

                                     <div class="tab-pane" id="casestatus">
                                        <h4 class="info-text">Displaying Accepted Case By Judge</h4>


                                        <div class="row">
                                            <?php
                                                $con = mysqli_connect("localhost","root","root","COURTCAL");
                                                if(!$con)
                                                {
                                                  echo  "Error connecting to database";

                                                }
                                                $sql="select * from Form_FIR where case_status='RUNNING_CASE';";
                                                $result = mysqli_query($con,$sql);
                                                $rows= mysqli_num_rows($result);

                                                 //  if (mysqli_num_rows($result) > 0) {
                                                 //    while($row = mysqli_fetch_assoc($result)) {
                                                 //       echo "Case number: " . $row["case_id"]. "<br>";
                                                 //    }
                                                 // } else {
                                                 //    echo "0 results";
                                                 // }
                                               

                                                ?>
                                            <div class="col-sm-9 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                            <?php 
                                                             if (mysqli_num_rows($result) > 0) {
                                                                while($row = mysqli_fetch_assoc($result)) {
                                                                echo "Case Number  : " . $row["case_id"] . "&emsp;&emsp;" . "Case Title   : " . $row["case_title"];
                                                            ?>
                                                            &emsp;&emsp;<a href="chargesheet_form.php"> <input type='button' class='btn btn-fill' style="color: white; float: right;" value="Make Chargesheet"></a>
                                                            <br/> 
                                                            <hr style="border-top: 3px solid gray;">
                                                            <?php }}
                                                            else{
                                                                echo "<h5>CASES ARE NOT AVALIABLE!<br/> Wait For Judgement</h5>";
                                                            } ?>

                                                     
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="wizard-footer">
                                            <div class="pull-right">
                                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='section_next' value='Next' />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div> -->
                                       
                                    </div>

                                 


                                </div>
                                <!-- <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
                                        <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='btn_fir' value='Finish' />
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div> -->
                            
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
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="assets/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
    <script src="assets/js/jquery.validate.min.js"></script>

</html>
