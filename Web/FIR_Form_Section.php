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
    <div class="image-container set-full-height" style="background-image: url('assets/img/#')">
        <!--   Creative Tim Branding   -->
        <a href="http://creative-tim.com">
             <p align="right" style="margin-right: 15px; margin-top: 5px background:black; "> 
    <a class="btn btn-next btn-fill btn-success btn-wd" href="logout.php">Logout</a>
    </p>
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
                           
                        <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                       First Information Report (FIR)
                                    </h3>
                                    <h5>This Information Will Generate FIR.</h5>
                                     
                                      <!-- <a class="btn btn-next btn-fill btn-success btn-wd" href="logout.php">Logout</a> -->
                                        
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        
                                        <li><a href="#selectfact" data-toggle="tab">Selection of Facts</a></li>
                                        <li><a href="#selectsections" data-toggle="tab">Apply Sections</a></li>

                                       
                                    </ul>
                                </div>

                                <div class="tab-content">

                                     <div class="tab-pane" id="selectfact">
                                        <h4 class="info-text"> Select Appropriate Facts </h4>
                                        <div class="row">
                                            <?php
                                                $con = mysqli_connect("localhost","root","root","COURTCAL");
                                                if(!$con)
                                                {
                                                  echo  "Error connecting to database";

                                                }
                                                $sql="select DISTINCT Title from IPC;";
                                                $result = mysqli_query($con,$sql);
                                                $rows= mysqli_num_rows($result);
                                                //echo $rows.'<br>';
                                                $r = [];

                                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                      //echo '<br>'.$row['Title'];
                                                      array_push($r, $row['Title']);
                                                    }
                                                ?>
                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                       <form method='post' action='FIR_Form_Section.php'>
                                                            <?php for ($i=1; $i < $rows; $i++) { 
                                                            ?>
                                                            <input type='checkbox' name='checkboxvar[]' id='checkboxvar[]' value = "<?php echo $r[$i];  ?>"><?php echo " ".$r[$i]; ?><br>
                                                            <?php } ?>
                                                    <div class="wizard-footer">
                                                        <div class="pull-right">
                                                            <input type='submit' value='Next' class='btn btn-next btn-fill btn-success btn-wd' name="btn_sections">
                                                             <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                        </form>
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

                                    <div class="tab-pane" id="selectsections">
                                        <h4 class="info-text"> Select Admissible Sections </h4>
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group label-floating">

                                                    <form action="insert_section.php" method="post">
                                                        <?php
                                                        $con = mysqli_connect("localhost","root","root","COURTCAL");
                                                        if(!$con)
                                                        {
                                                          echo  "Error connecting to database";

                                                        }
                                                        $selected_sections = [];
                                                        if(isset($_POST['btn_sections'])) 
                                                        {
                                                            $selected = $_POST['checkboxvar'];

                                                            $_SESSION['case-title'] = "";
                                                            $_SESSION['case_title'] = $selected;
                                                            for ($i=0; $i < count($selected) ; $i++) { 
                                                                //print_r($selected[$i]);
                                                                $sql="select * from IPC where Title='$selected[$i]';";
                                                                $result = mysqli_query($con,$sql);
                                                                echo '<br>'."Title :  ".$selected[$i].'<br>';

                                                                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                                    array_push($selected_sections, $row['Sections']); 
                                                        ?>
                                                        <input type="checkbox" name="sectionvar[]" value="<?php echo $row['Sections'];?>">
                                                        <?php echo $row['Sections']." ".$row['Description'];?>
                                                        </br>
                                                        </input>


                                                           <?php }
                                                        }
                                                        }
                                                        // echo "<script>$('#selectsections').click();</script>";
                                                        ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="wizard-footer">
                                            <div class="pull-right">
                                             
                                              <button class="btn btn-finish btn-fill btn-success btn-wd" name="btn_finish" type="submit">Finish</button>
                                            </div>

                                            <div class="pull-left">
                                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />

                                            </div>
                                                </form>

                                            <div class="clearfix"></div>
                                        </div>
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
