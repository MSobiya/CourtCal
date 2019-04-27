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
                <div class="col-sm-12 col-sm-offset-0 ">
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card" data-color="red">
                           
                        <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                
                                    <h3 align="center" class="wizard-title">
                                      CHARGE SHEET
                                    </h3>
                                    <h5 align="center">This Information Will Generate charge sheet.</h5>
                                                                
                                <form action="cs_process.php" method="post">
                                    <table class="form" align="center">
                                        <tr>
                                        <th>SR NO.</th>
                                        <th>PARAMETERS</th>
                                        <th>DATA INPUTS</th>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Name of the Branch </td>
                                            <td><input type="text" name="branch_nm" id="branch_nm"></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Final Report/Charge Sheet No.</td>
                                            <td><input type="text" name="cs_no" id="cs_no"></td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>charge sheet Date</td>
                                            <td><input type="Date" name="cs_date" id="cs_date"></td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Type of Final Report </td>
                                            <td><input type="text" name="type_fr" id="type_fr"></td>
                                        </tr>
                                        <tr>
                                            <td>5.</td>
                                            <td>If Final Report Un - occurred/ false/mistake of /<br/> Mistake of law /Non - cognizable / Civil nature</td>
                                            <td><input type="text" name="report_option" id="report_option"></td>
                                        </tr>
                                        <tr>
                                            <td>6.</td>
                                            <td>If charge-sheeted original / Supplementary </td>
                                            <td><input type="text" name="cs_os" id="cs_os"></td>
                                        </tr>
                                        <tr>
                                            <td>7.</td>
                                            <td>Name of investigating officer</td>
                                            <td><input type="text" name="if_nm" id="if_nm"></td>
                                        </tr>
                                        <tr>
                                            <td>8.</td>
                                            <td>Name of complainant / informant </td>
                                            <td><input type="text" name="complainant_nm" id="complainant_nm"></td>
                                        </tr>
                                        <tr>
                                            <td>9.</td>
                                            <td>Details of Properties Articles / Documents recovered <br/>/ seized during the investigation and relied</td>
                                            <td><input type="text" name="pa_detail" id="pa_detail"></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>Case id</td>
                                            <td><input type="text" name="case_id" id="case_id"></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>Number of Accused Persons</td>
                                            <td><input type="number" name="no_of_acc_persons" id="no_of_acc_persons"></td>
                                        </tr>
                                </table>
                                <br>
                              <!--   <div class="col-sm-10 col-sm-offset-1">
                                    <h4 style="font-weight: bold; margin-left: 27px;">
                                        10. Particulars of accused person charge sheeted:
                                        <center>A-16</center>
                                    </h4>
                                </div>    
                                  <table class="sub" align="center">
                                        
                                        <tr>
                                            <td>Name</td>
                                            <td><input type="text" name="acsdpsn_name" id="acsdpsn_name"></td>
                                        </tr>
                                        <tr>
                                            <td>Whether verified</td>
                                            <td><input type="text" name="nm_verified" id="nm_verified"></td>
                                        </tr>
                                        <tr>
                                            <td>Father’s Name</td>
                                            <td><input type="text" name="father_nm" id="father_nm"></td>
                                        </tr>
                                        <tr>
                                            <td>Age /Date of Birth</td>
                                            <td><input type="date" name="age" id="age"></td>
                                        </tr>
                                        <tr>
                                            <td>sex</td>
                                            <td><input type="text" name="gen" id="gen"></td>
                                        </tr>
                                        <tr>
                                            <td>Nationality</td>
                                            <td><input type="text" name="nation" id="nation"></td>
                                        </tr>
                                        <tr>
                                            <td>Passport No</td>
                                            <td><input type="text" name="psprt_no" id="psprt_no"></td>
                                        </tr>
                                        <tr>
                                            <td>Place of issue</td>
                                            <td><input type="text" name="plc_issue" id="plc_issue"></td>
                                        </tr>
                                        <tr>
                                            <td>Date of issue</td>
                                            <td><input type="text" name="issue_date" id="issue_date"></td>
                                        </tr>
                                        <tr>
                                            <td>Religion</td>
                                            <td><input type="text" name="religion" id="religion"></td>
                                        </tr>
                                         <tr>
                                            <td>Occupation</td>
                                            <td><input type="text" name="ocptn" id="ocptn"></td>
                                        </tr>
                                        <tr>
                                            <td>Address
                                            (Present/Permanent)</td>
                                            <td><input type="text" name="adrs" id="adrs"></td>
                                        </tr>
                                        <tr>
                                            <td>Whether verified</td>
                                            <td><input type="text" name="adrs_verified" id="adrs_verified"></td>
                                        </tr>
                                        <tr>
                                            <td>Provisional Criminal No.</td>
                                            <td><input type="text" name="provisnl_no" id="provisnl_no"></td>
                                        </tr>
                                        <tr>
                                            <td>Regular Criminal No. (if
                                            known)</td>
                                            <td><input type="text" name="reglr_cno" id="reglr_cno"></td>
                                        </tr>                                        
                                        <tr>
                                            <td>Date of Arrest</td>
                                            <td><input type="date" name="arst_dt" id="arst_dt"></td>
                                        </tr>
                                        <tr>
                                            <td>Date of release on bail</td>
                                            <td><input type="date" name="bail_dt" id="bail_dt"></td>
                                        </tr>
                                        <tr>
                                            <td>Under Acts & Sections
                                            (of charge sheet)</td>
                                            <td><input type="text" name="cs_sec" id="cs_sec"></td>
                                        </tr>          
                                        <tr>
                                            <td>Name (s) of bailer/sureties Address</td>
                                            <td><input type="text" name="bailer_nm_adrs" id="bailer_nm_adrs"></td>
                                        </tr>
                                        <tr>
                                            <td>Previous convictions with case reference</td>
                                            <td><input type="text" name="pre_caserefernc" id="pre_caserefernc"></td>
                                        </tr>
                                        <tr>
                                            <td>Status of the accused</td>
                                            <td><input type="text" name="accused_status" id="accused_status"></td>
                                        </tr>
                                </table> -->
                                <br>
                                <div class="col-sm-10 col-sm-offset-1">
                                    <h4 style="font-weight: bold; margin-left: 27px;">
                                        10. Particulars of accused persons not charge sheeted: NIL.
                                    </h4>
                                </div>

                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="form-group label-floating">
                                        <label  class="control-label"><b>(i) Particulars of Witnesses examined:</b></label><br>
                                        <input id="witnesse_examied" type="text" name="witnesse_examied" class="form-control">
                                    </div>
                                    
                                    <div class="form-group label-floating">
                                        <label class="control-label"><b>(ii) List of Documents :</b></label><br>
                                        <input id="doc_list" type="text" name="doc_list" class="form-control">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label"><b>(iii) List of Material objects
                                        :</b></label><br>
                                        <input id="material_obj" type="text" name="material_obj" class="form-control">
                                    </div>
                                    
                                    <h4 style="font-weight: bold; margin-left: 27px;">
                                        11. If F.I.R. is false, action taken: Not false, allegations in the FIR are true.
                                    </h4>
                                
                                    <h4 style="font-weight: bold; margin-left: 27px;">
                                        12. Result of laboratory Analysis: As mentioned in Para 14.
                                    </h4>
                                 

                                    <h4 style="font-weight: bold; margin-left: 27px;">
                                        13. Brief facts of the case :
                                    </h4> 
                                    
                                    <br>  
                                    <div class="form-group label-floating">
                                        <label for="Brief_facts" class="control-label"><b>Brief facts of the case <b></label><br>
                                        <textarea id="brief_fact" type="text" name="brief_fact" class="form-control" rows="30" ></textarea>
                                    </div>

                                    <h4 style="font-weight: bold; margin-left: 27px;">
                                        14. Facts Disclosed During Investigation:
                                    </h4> 

                                    <br>  
                                    <div class="form-group label-floating">
                                        <label for="invstn_facts" class="control-label"><b>Facts Disclosed During Investigation <b></label><br>
                                        <textarea id="invstn_fact" type="text" name="invstn_fact" class="form-control" rows="30" ></textarea>
                                    </div> 


                                    <h4 style="font-weight: bold; margin-left: 27px;" class="col-sm-3  col-sm-offset-1">
                                        15. Dispatched on :
                                    </h4>
                                        <div class="form-group col-sm-2  col-sm-offset-2">
                                        <input id="dispatched_dt" type="date" name="dispatched_dt" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-sm-10 col-sm-offset-1">
                                     <h4 style="font-weight: bold; margin-left: 27px;" class="col-sm-3  col-sm-offset-1">
                                        16. No. of Enclosures :
                                    </h4>
                                      
                                     <div class="form-group label-floating col-sm-2  col-sm-offset-2">
                                        <label  class="control-label"><b>No. of Eenclosures<b></label><br>    
                                        <input id="nums_enclosures" type="text" name="nums_enclosures" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-10 col-sm-offset-1">
                                     <h4 style="font-weight: bold; margin-left: 27px;" class="col-sm-3  col-sm-offset-1">
                                        17. List of Enclosures :
                                    </h4>
                                      
                                     <div class="form-group label-floating col-sm-2  col-sm-offset-2">
                                        <label class="control-label"><b>List of Eenclosures<b></label><br>    
                                        <input id="list_enclosures" type="text" name="list_enclosures" class="form-control">
                                    </div>
                                </div>
                                 <div class="col-sm-3 col-sm-offset-8" align="left">
                                    <div class="form-group label-floating ">
                                    <label for="Brief_facts" class="control-label"><b>Police Name<b></label><br>
                                    <input id="police_nm" type="text" name="police_nm" class="form-control">
                                     </div>
                                    <label for="Brief_facts" ><b>SUPERINTENDENT OF POLICE,<b></label><br> 
                                    <label for="Brief_facts" ><b>SHIEF INVESTIGATION OFFICER, NIA, NEW DELHI.<b></label><br> 
                                 </div>



                                <br>
                                <p align="right" style=" margin-top: 10px; margin-right: 40px;">
                                  <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='btn_cs1' value='Next' />
                                </p>
                            </form>    
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
