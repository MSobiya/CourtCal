<?php
 session_start();
 if(count($_SESSION) == 0)
     header("Location:login.php");
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
{
  echo  "Error connecting to database";
}
else{
if(isset($_POST['btn_cs1'])){
$_SESSION['no_of_acc_persons'] = $_POST['no_of_acc_persons'];
$branch_nm = $_POST['branch_nm'];
$cs_no = $_POST['cs_no'];
$cs_date = $_POST['cs_date'];
$type_fr = $_POST['type_fr'];
$report_option = $_POST['report_option'];
$cs_os = $_POST['cs_os'];
$if_nm = $_POST['if_nm'];
$complainant_nm = $_POST['complainant_nm'];
$pa_detail = $_POST['pa_detail'];
$witnesse_examied = $_POST['witnesse_examied'];
$doc_list = $_POST['doc_list'];
$material_obj = $_POST['material_obj'];
$brief_fact = $_POST['brief_fact'];
$invstn_fact = $_POST['invstn_fact'];
$dispatched_dt = $_POST['dispatched_dt'];
$nums_enclosures = $_POST['nums_enclosures'];
$list_enclosures = $_POST['list_enclosures'];
$police_nm = $_POST['police_nm'];

$case_id = $_POST['case_id'];
$_SESSION['case_id'] = $case_id;

$sql = "SELECT * FROM Chargesheet_Form";
$result = mysqli_query($con,$sql);
$rows= mysqli_num_rows($result);

$cs_id = 'cs_id '.$rows;

$_SESSION['cs_id'] = $cs_id;


/*echo $police_nm;
echo "<br>".$brief_fact;
echo "<br>".$invstn_fact;
echo $_SESSION['no_of_acc_persons'];*/

$sql = "insert into Chargesheet_Form (cs_id, case_id, branch_nm, cs_no, cs_date, type_fr, report_option, cs_os, if_nm, complainant_nm, pa_detail, witnesse_examied, doc_list, material_obj, brief_fact, invstn_fact, dispatched_dt, nums_enclosures, list_enclosures, police_nm) values ('$cs_id', '$case_id','$branch_nm','$cs_no','$cs_date','$type_fr', '$report_option','$cs_os','$if_nm', '$complainant_nm', '$pa_detail','$witnesse_examied','$doc_list','$material_obj', '$brief_fact', '$invstn_fact', '$dispatched_dt', '$nums_enclosures', '$list_enclosures', '$police_nm')";

$result = mysqli_query($con,$sql);
if(!$result)
{
  echo "error ";
  echo mysqli_error($con);
}
else
	header("Location:chargesheet_table.php");
}

if(isset($_POST['btn_cs2'])){
$acsdpsn_name = $_POST['acsdpsn_name'];
$nm_verified = $_POST['nm_verified'];
$father_nm = $_POST['father_nm'];
$age = $_POST['age'];
$gen = $_POST['gen'];
$nation = $_POST['nation'];
$psprt_no = $_POST['psprt_no'];
$plc_issue = $_POST['plc_issue'];
$issue_date = $_POST['issue_date'];
$religion = $_POST['religion'];
$ocptn = $_POST['ocptn'];
$adrs = $_POST['adrs'];
$adrs_verified = $_POST['adrs_verified'];
$provisnl_no = $_POST['provisnl_no'];
$reglr_cno = $_POST['reglr_cno'];
$arst_dt = $_POST['arst_dt'];
$bail_dt = $_POST['bail_dt'];
$cs_sec = $_POST['cs_sec'];
$bailer_nm_adrs = $_POST['bailer_nm_adrs'];
$pre_caserefernc = $_POST['pre_caserefernc'];
$accused_status = $_POST['accused_status'];
$cs_id = $_SESSION['cs_id'];


$sql = "insert into Chargesheet_Table (cs_id, acsdpsn_name, nm_verified, father_nm, age, gen, nation, psprt_no, plc_issue, issue_date, religion, ocptn, adrs, adrs_verified, provisnl_no, reglr_cno, arst_dt, bail_dt, cs_sec, bailer_nm_adrs, pre_caserefernc, accused_status) values ('$cs_id', '$acsdpsn_name', '$nm_verified', '$father_nm', '$age', '$gen', '$nation', '$psprt_no', '$plc_issue', '$issue_date', '$religion', '$ocptn', '$adrs', '$adrs_verified', '$provisnl_no', '$reglr_cno', '$arst_dt', '$bail_dt', '$cs_sec', '$bailer_nm_adrs', '$pre_caserefernc', '$accused_status')";

$result = mysqli_query($con,$sql);
if(!$result)
{
  echo "error ";
  echo mysqli_error($con);
}
else{
$_SESSION['no_of_acc_persons'] -= 1;
//echo $_SESSION['no_of_acc_persons'];
if($_SESSION['no_of_acc_persons'] > 0)
	header("Location:chargesheet_table.php");
else{
	echo "submitted";
	header("Location:Case_status.php");
}
}
}

}
?>