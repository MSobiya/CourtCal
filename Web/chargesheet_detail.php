<?php
session_start();
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
{
  echo  "Error connecting to database";

}

//if(isset($_POST['bt_chargesheet'])){

    //$sql="select * from Chargesheet_Form where cs_id='cs_id 0';";
    $cs_id = $_GET['cs_id'];
    //echo $case_id;
    $sql="select * from Chargesheet_Form where cs_id='$cs_id';";
    $result = mysqli_query($con,$sql);
    $rows= mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);
    //$cs_id = $row['cs_id'];
    //$cs_id = 'cs_id 0';
    
    $sql1="select * from Chargesheet_Table where cs_id='$cs_id';";
    $result1 = mysqli_query($con,$sql1);
    $rows1= mysqli_num_rows($result1);
    

  // if (mysqli_num_rows($result1) > 0) {
  //   while($row1 = mysqli_fetch_assoc($result1)) {
  //   echo $row1['cs_id']."<br>"; 
  //   }
  // }
 //}
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
                                    <h5 align="center">Generated chargesheets.</h5>
                                                                
                                
                                    <table class="form" align="center">
                                        <tr>
                                        <th>SR NO.</th>
                                        <th>PARAMETERS</th>
                                        <th>DATA INPUTS</th>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>Name of the Branch </td>
                                            <td><?php echo $row['branch_nm']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Final Report/Charge Sheet No.</td>
                                            <td><?php echo $row['cs_no']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>charge sheet Date</td>
                                            <td><?php echo $row['cs_date']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Type of Final Report </td>
                                            <td><?php echo $row['type_fr']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>5.</td>
                                            <td>If Final Report Un - occurred/ false/mistake of /<br/> Mistake of law /Non - cognizable / Civil nature</td>
                                            <td><?php echo $row['report_option']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>6.</td>
                                            <td>If charge-sheeted original / Supplementary </td>
                                            <td><?php echo $row['cs_os']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>7.</td>
                                            <td>Name of investigating officer</td>
                                            <td><?php echo $row['if_nm']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>8.</td>
                                            <td>Name of complainant / informant </td>
                                            <td><?php echo $row['complainant_nm']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>9.</td>
                                            <td>Details of Properties Articles / Documents recovered <br/>/ seized during the investigation and relied</td>
                                            <td><?php echo $row['pa_detail']; ?></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td>Case id</td>
                                            <td><?php echo $row['case_id']; ?></td>
                                        </tr>

                                        <!-- <tr>
                                            <td></td>
                                            <td>Number of Accused Persons</td>
                                            <td><?php echo $row['no_of_acc_persons']; ?></td>
                                        </tr> -->
                                </table>
                                <br>
                                <div class="col-sm-10 col-sm-offset-1">
                                    <h4 style="font-weight: bold; margin-left: 27px;">
                                        10. Particulars of accused person charge sheeted:
                                        
                                    </h4>
                                </div>    
                                 
                                  <?php
                                  echo "<table class='sub' align='center'>";

                                    while($row1 = mysqli_fetch_array($result1)){
                                      $accused_id = $row1[0];
                                      $cs_id = $rows1[1];
                                      
                                      $acsdpsn_name = $row1[2];
                                      $nm_verified =  $row1[3];
                                      $father_nm = $row1[4];
                                      $age = $row1[5];
                                      $gen = $row1[6];
                                      $nation = $row1[7];
                                      $psprt_no = $row1[8];
                                      $plc_issue = $row1[9];
                                      $issue_date = $row1[10];
                                      $religion = $row1[11];
                                      $ocptn = $row1[12];
                                      $adrs = $row1[13];
                                      $adrs_verified = $row1[14];
                                      $provisnl_no = $row1[15];
                                      $reglr_cno = $row1[16];
                                      $arst_dt = $row1[17];
                                      $bail_dt = $row1[18];
                                      $cs_sec = $row1[19];
                                      $bailer_nm_adrs = $row1[20];
                                      $pre_caserefernc = $row1[21];
                                      $accused_status = $row1[22];
                                      
                                        echo "<th colspan='2'>";
                                        echo "<center>A-16</center>";
                                        echo "</th>";

                                        echo "<tr>";
                                        echo "<td><b>Person</b></td>";
                                        echo "<td>{$accused_id}</td>";
                                        echo "</tr>";
                                      
                                        echo "<tr>";
                                        echo "<td>Name</td>";
                                        echo "<td> {$acsdpsn_name} </td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<td>Whether verified</td>";
                                        echo "<td>{$nm_verified}</td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<td>Father’s Name</td>";    
                                        echo "<td>{$father_nm}</td>";    
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<td>Age /Date of Birth</td>";
                                        echo "<td>{$age}</td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<td>sex</td>";    
                                        echo "<td>{$gen}</td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<td>Nationality</td>";
                                        echo "<td>{$nation}</td>";    
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<td>Passport No</td>";
                                        echo "<td>{$psprt_no}</td>";    
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<td>Place of issue</td>";    
                                        echo "<td>{$plc_issue}</td>";   
                                        echo "</tr>";

                                        echo "<tr>";
                                        echo "<td>date of issue</td>";    
                                        echo "<td>{$issue_date}</td>";    
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<td>Religion</td>";    
                                        echo "<td>{$religion}</td>";    
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<td>Occupation</td>";    
                                        echo "<td>{$ocptn}</td>";    
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<td>Address (Present/Permanent)</td>";    
                                        echo "<td>{$adrs}</td>";    
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<td>Whether verified</td>";
                                        echo "<td>{$adrs_verified}</td>";    
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<td>Provisional Criminal No.</td>";    
                                        echo "<td>{$provisnl_no}</td>";    
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<td>Regular Criminal No. (if known)</td>";    
                                        echo "<td>{$reglr_cno}</td>";    
                                        echo "</tr>";                                        
                                        
                                        echo "<tr>";
                                        echo "<td>Date of Arrest</td>";    
                                        echo "<td>{$arst_dt}</td>";    
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<td>Date of release on bail</td>";    
                                        echo "<td>{$bail_dt}</td>";    
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<td>Under Acts & Sections (of charge sheet)</td>";    
                                        echo "<td>{$cs_sec}</td>";    
                                        echo "</tr>";          
                                        
                                        echo "<tr>";
                                        echo "<td>Name (s) of bailer/sureties Address</td>";    
                                        echo "<td>{$bailer_nm_adrs}</td>";    
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<td>Previous convictions with case reference</td>";    
                                        echo "<td>{$pre_caserefernc}</td>";    
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<td>Status of the accused</td>";    
                                        echo "<td>{$accused_status}</td>";    
                                        echo "</tr>";

                                      
                                    }
                                  echo "</table>";
                                  ?>
                                <br>
                                <div class="col-sm-10 col-sm-offset-1">
                                    <h4 style="font-weight: bold; margin-left: 27px;">
                                        11. Particulars of accused persons not charge sheeted: NIL.
                                    </h4>
                                </div>

                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="form-group label-floating">
                                        <label><h4><b>(i) Particulars of Witnesses examined:</h4></b></label><br>
                                        <input id="witnesse_examied" value="<?php echo $row['witnesse_examied']; ?>" type="text" name="witnesse_examied" class="form-control" disabled>

                                    </div>
                                    
                                    <div class="form-group label-floating">
                                        <label><h4><b>(ii) List of Documents :</h4></b></label><br>
                                        <input id="doc_list" type="text" value="<?php echo $row['doc_list']; ?>" disabled name="doc_list" class="form-control">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label><h4><b>(iii) List of Material objects :</h4></b></label><br>
                                        <input id="material_obj" type="text" value="<?php echo $row['material_obj']; ?>" disabled name="material_obj" class="form-control">
                                    </div>
                                    
                                    <h4 style="font-weight: bold; margin-left: 27px;">
                                        12. If F.I.R. is false, action taken: Not false, allegations in the FIR are true.
                                    </h4>
                                
                                    <h4 style="font-weight: bold; margin-left: 27px;">
                                        13. Result of laboratory Analysis: As mentioned in Para 15.
                                    </h4>
                                 

                                    <h4 style="font-weight: bold; margin-left: 27px;">
                                        14. Brief facts of the case :
                                    </h4> 
                                    
                                    <br>  
                                    <div class="form-group label-floating">
                                        <label for="brief_fact"><h4><b>Brief facts of the case </b></h4></label><br>
                                        <p><?php echo $row['brief_fact']; ?></p>
                                        <br/>
                                    </div>

                                    <h4 style="font-weight: bold; margin-left: 27px;">
                                        15. Facts Disclosed During Investigation:
                                    </h4> 

                                    <br>  
                                    <div class="form-group label-floating">
                                        <label for="invstn_facts"><h4><b>Facts Disclosed During Investigation</b></h4></label><br>
                                        <p><?php echo $row['invstn_fact']; ?></p>
                                    </div> 


                                    <h4 style="font-weight: bold; margin-left: 27px;" class="col-sm-3  col-sm-offset-1">
                                        16. Dispatched on :
                                    </h4>
                                        <div class="form-group col-sm-2  col-sm-offset-2">
                                        <!-- <input id="dispatched_dt" type="date" name="dispatched_dt" class="form-control"> -->
                                        <b><?php echo $row['dispatched_dt']; ?></b>
                                    </div> 
                                </div>
                                <div class="col-sm-10 col-sm-offset-1">
                                     <h4 style="font-weight: bold; margin-left: 27px;" class="col-sm-3  col-sm-offset-1">
                                        17. No. of Enclosures :
                                    </h4>
                                      
                                     <div class="form-group label-floating col-sm-2  col-sm-offset-2">
                                        <!-- <label  class="control-label"><b>No. of Eenclosures<b></label><br>     -->
                                        <!-- <input id="nums_enclosures" type="text" name="nums_enclosures" class="form-control"> -->
                                        <b><?php echo $row['nums_enclosures']; ?></b>
                                    </div>
                                </div>

                                <div class="col-sm-10 col-sm-offset-1">
                                     <h4 style="font-weight: bold; margin-left: 27px;" class="col-sm-3  col-sm-offset-1">
                                        18. List of Enclosures :
                                    </h4>
                                      
                                     <div class="form-group label-floating col-sm-2  col-sm-offset-2">
                                        <!-- <label class="control-label"><b>List of Eenclosures<b></label><br>     -->
                                        <!-- <input id="list_enclosures" type="text" name="list_enclosures" class="form-control"> -->
                                        <b><?php echo $row['list_enclosures']; ?></b>
                                    </div>
                                </div>
                                 <div class="col-sm-3 col-sm-offset-8" align="right">
                                    <div class="form-group label-floating ">
                                    <!-- <label for="Brief_facts" class="control-label"><b>Police Name<b></label><br> -->
                                    <?php echo $row['police_nm']; ?>
                                     </div>
                                    <label for="Brief_facts" ><b>SUPERINTENDENT OF POLICE,<b></label><br> 
                                    <label for="Brief_facts" ><b>SHIEF INVESTIGATION OFFICER, NIA, NEW DELHI.<b></label><br> 
                                 </div>



                                <br>
                                <p align="right" style=" margin-top: 10px; margin-right: 40px;">
                                  <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' onclick="myFunction()" name='btn_cs1' value='Print' />
                                </p>
                            
                        </div>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->
        </div> <!--  big container -->



<script>
function myFunction() {
  window.print();
}
</script>


</body>
    <!--   Core JS Files   -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="assets/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
    <script src="assets/js/jquery.validate.min.js"></script>

</html>
