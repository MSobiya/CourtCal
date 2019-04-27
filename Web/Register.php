<script type="text/javascript">
    function send_OTP(){
    //$('#resultMsg').load('sendOTP.php');
    $('#resultMsg').load('sendOTP.php?email=' + $('#email').val());
    //alert("hello");
      //$(document).load('sendOTP.php');
    }

    function verify_OTP(){
    //$('#resultMsg').load('sendOTP.php');
    $('#veriRes').load('verifyOTP.php?urno=' + $('#otpvalue').val(), 'spcl=' + $('#specialization').val());
    //$('#veriRes').load('verifyOTP.php?urno=' + $('#otpvalue').val());

      //$(document).load('sendOTP.php');
    }
    // function store_Spcl(){
    // //$('#resultMsg').load('sendOTP.php');
    // //$('document').load('storeSp.php?urno=' + $('#otpvalue').val());
    //  //$('document').load('storeSp.php?spcl=' + $('#specialization option:selected').val());
    //   $('#gen_id').load('storeSp.php');
   // }
    
</script>

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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
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
                            <form method="post" action="Connectivity.php">
                        <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                       Build Your Profile
                                    </h3>
                                    <h5>This information will let us know more about you.</h5>
                                </div>
                                <div class="wizard-navigation">
                                    <ul class="nav nav-tabs">
                                        <li><a href="#about" data-toggle="tab">About</a></li>
                                        <li><a href="#career" data-toggle="tab">Career</a></li>
                                        <li><a href="#contact" data-toggle="tab">Contact Details</a></li>
                                         <li><a href="#verification" data-toggle="tab">Verification</a></li>
                                        <li><a href="#password" data-toggle="tab">Password</a></li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="about">
                                      <div class="row">
                                            <h4 class="info-text"> Let's start with the basic information (About Your self)</h4>
                                            <div class="col-sm-4 col-sm-offset-1"><br><br>
                                               <!--  <div class="picture-container">
                                                    <div class="picture">
                                                        <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" id="wizard-picture">
                                                    </div>
                                                    <h6>Choose Picture</h6>
                                                </div>-->
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                     <span class="input-group-addon">
                                                        <!-- <i class="material-icons">face</i> -->
                                                    </span> 
                                                    <div class="form-group label-floating">
                                                      <label class="control-label">First Name <small>(required)</small></label>
                                                      <input name="f_name" id="f_name" type="text" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="material-icons">record_voice_over</i> -->
                                                    </span>
                                                    <div class="form-group label-floating">
                                                      <label class="control-label">Last Name <small>(required)</small></label>
                                                      <input name="l_name" id="l_name" type="text" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="input-group">
                                                     <span class="input-group-addon">
                                                        <!-- <i class="material-icons">face</i> -->
                                                    </span> 
                                                    <div class="form-group label-floating">
                                                      <label class="control-label">Address <small>(required)</small></label>
                                                      <textarea  name="address" id="address" type="text" class="form-control" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="material-icons">email</i> -->
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label for="dob" class="control"><h6>Date Of Birth </h6></label><br/>
                                                        <input name="dob" value="date" type="date" id='dob'" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="material-icons">email</i> -->
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <!-- <label for="Gender" class="control"><h6>Gender </h6></label><br/>
                                                        <label for="male">Male &emsp;</label>
                                                        <input name="male" value="male" type="radio" id='gender'">&emsp;&emsp;
                                                        <label for="female">Female &emsp;</label>
                                                        <input name="female" value="female" type="radio" id='gender'><br/> -->

                                                        <label>Gender:</label>

                                                        <input type="radio" name="gender" value="male" id="male">Male  
                                                        <input type="radio" name="gender" value="female" id="female">Female<br>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="wizard-footer">
                                         <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
                                    </div>
                                    <div class="clearfix"></div>
                                    </div>  
                                    </div>

                                    <div class="tab-pane" id="career">
                                        <h4 class="info-text"> What is your position? (Career detals) </h4>
                                        <div class="row">

                                            <!-- <div class="col-sm-10 col-sm-offset-1">
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="jobb" value="Design">
                                                        <div class="icon">
                                                            <i class="fa fa-pencil"></i>
                                                        </div>
                                                        <h6>Design</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="jobb" value="Code">
                                                        <div class="icon">
                                                            <i class="fa fa-terminal"></i>
                                                        </div>
                                                        <h6>Code</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="jobb" value="Develop">
                                                        <div class="icon">
                                                            <i class="fa fa-laptop"></i>
                                                        </div>
                                                        <h6>Develop</h6>
                                                    </div>
                                                </div>
                                            </div> -->

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="material-icons">email</i> -->
                                                    </span>
                                                    <div class="form-group label-floating">
                                                         <label for="specialisation"><h4><b>Specialization</b>   </h4></label><br/>
                                                        <select name="specialization" id='specialization' class="form-control" required>
                                                            <option value="Police">Police</option>
                                                            <option value="Stenotypist">Stenotypist</option>
                                                        </select>                                                     
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="col-sm-10 col-sm-offset-1">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label for="stenotypist" class="control"><h6>Stenotypist ID </h6></label><br/>
                                                        <input name="id" type="text" id='id' class="form-control">
                                                        
                                                </div>
                                            </div> -->
                                            <!--<div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label class="control-label">Your Registered ID</label>
                                                        <input id="id" type="text" name="id" class="form-control" required>
                                                </div>
                                            </div>-->
                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label class="control-label">Your Posting Area</label>
                                                        <input id="posting_area" type="Number" name="posting_area" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label class="control-label">Rank only for police</label>
                                                        <input id="rank" type="text" name="rank" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <br/><br/>
                                        <div class="wizard-footer">
                                            <div class="pull-right">
                                                <!-- <input type='button' onclick="store_Spcl()" class='btn btn-next btn-fill btn-success btn-wd' name='btn_spcl' value='Next' /> -->
                                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='btn_spcl' value='Next' />
                                            </div>

                                            <div class="pull-left">
                                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                            </div>
                                            <div class="clearfix"></div>
                                            </div>
                                    </div>
                                    <div class="tab-pane" id="contact">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text"> What Is Your Identity? (Contact Details) </h4>
                                            </div>
                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Aadhaar Number</label>
                                                    <input type="text" class="form-control" id = "aadhar" name = "aadhar" required>
                                                </div>
                                            </div>
                                             <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Phone Number</label>
                                                    <input type="text" id = "phn_no" name = "phn_no" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="material-icons">email</i> -->
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Email <small>(required)</small></label>
                                                        <input id="email" name="email" type="email" class="form-control" required>
                                                    </div>  
                                                </div>
                                            </div>

                                            <!-- <div class="col-sm-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Street Number</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">City</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Country</label>
                                                    <select name="country" class="form-control">
                                                        <option disabled="" selected=""></option>
                                                        <option value="Afghanistan"> Afghanistan </option>
                                                        <option value="Albania"> Albania </option>
                                                        <option value="Algeria"> Algeria </option>
                                                        <option value="American Samoa"> American Samoa </option>
                                                        <option value="Andorra"> Andorra </option>
                                                        <option value="Angola"> Angola </option>
                                                        <option value="Anguilla"> Anguilla </option>
                                                        <option value="Antarctica"> Antarctica </option>
                                                        <option value="...">...</option>
                                                    </select>
                                                </div>
                                            </div>-->

                                        </div>
                                    <br/> <br/><br/> <br/><br/> <br/>


                                    <div class="wizard-footer">
                                    <div class="pull-right">
                                        <br>
                                         <input type='button' onClick='send_OTP()' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
                                          <!-- <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' id='btn_otp' name='btn_otp' value='Next' /> -->
                                         

                                       <!--  <input type='button' onClick='sendOTP()' class='btn btn-finish btn-fill btn-success btn-wd' name='next' value='Next' /> -->


                                    </div>

                                    <div class="pull-left">
                                        <br/>
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                    </div>

                                    <div class="tab-pane" id="contact">
                                        <h4 class="info-text"> What is your position? (Career details) </h4>
                                        <div class="row">

                                            

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="material-icons">email</i> -->
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label for="specialization" class="control"><h6>Specialization </h6></label><br/>
                                                        <select name="specialization" id='specialization' class="form-control">
                                                            <option value="Police">Police</option>
                                                            <option value="Stenotypist">Stenotypist</option>
                                                        </select>                                                           
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="col-sm-10 col-sm-offset-1">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label for="stenotypist" class="control"><h6>Stenotypist ID </h6></label><br/>
                                                        <input name="id" type="text" id='id' class="form-control">
                                                        
                                                </div>
                                            </div> -->

                                           <!--  <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label class="control-label">Your Registered ID</label>
                                                        <input id="id" type="Number" name="id" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label class="control-label">Your Posting Area</label>
                                                        <input id="posting_area" type="text" name="posting_area" class="form-control">
                                                </div>
                                            </div> -->
                                            <!-- <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                        <label class="control-label">Rank only for police</label>
                                                        <input id="rank" type="text" name="rank" class="form-control">
                                                </div>
                                            </div> -->



                                        </div>
                                    </div>

                                    <div class="tab-pane" id="verification">
                                    
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text"> You Must Verify Your Contact details (Verification) </h4>
                                            </div>
                                           
                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Enter OTP for Verification</label>
                                                    <input type="text" name="otpvalue" id="otpvalue" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div id='resultMsg'></div>
                                      
                                        <div class="wizard-footer">
                                            <div class="pull-right">
                                                 <!-- <input type='submit' class='btn btn-next btn-fill btn-success btn-wd' name='btn_verify' value='Verify' />  -->


                                                 <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='verifyOTP' onClick='verify_OTP()' value='VERIFY' />
                                                <!-- <input type='button'onClick='verify_OTP()' class='btn btn-next btn-fill btn-success btn-wd' name='btn_verify' id='btn_verify' value='Verify' /> -->
                                            </div>


                                            <div class="pull-left">
                                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                            </div>
                                            <div class="clearfix"></div>
                                            </div>

                                    </div>

                                     <div class="tab-pane" id="password">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text"> Configration Your Password (Password) </h4>
                                            </div>
                                           
                                           <!-- <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                    <label for="gen_id"><h3 id="gen_id"></h3></label>

                                               </div>
                                            </div> -->
                                            <div id='veriRes'></div>
                                            
                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Password</label>
                                                    <input type="password" name="password" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Confirm Password</label>
                                                    <input type="password" name="password" class="form-control" required>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>

                                        <div class="wizard-footer">
                                            <div class="pull-right">
                                             <button class="btn btn-finish btn-fill btn-success btn-wd" name="btn_finish" type="submit">Finish</button>

                                                <!-- <input type='button'onClick='verify_OTP()' class='btn btn-next btn-fill btn-success btn-wd' name='btn_verify' id='btn_verify' value='Verify' /> -->
                                            </div>


                                            <div class="pull-left">
                                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                            </div>
                                            <div class="clearfix"></div>
                                            </div>


                                    </div>

                                </div>
                                <!--  <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
                                

                                        <button class="btn btn-finish btn-fill btn-success btn-wd" name="btn_finish" type="submit">Finish</button>
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div> --> 
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





