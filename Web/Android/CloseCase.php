<?php
$EmailJR = $_POST['EmailJR'];
$case_id = $_POST['case_id'];
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
  echo  "Error connecting to database";

//-------- Update Case as Closed---
$sql = "UPDATE Form_FIR SET case_status='CLOSED_CASE' where case_id='$case_id'";

$result = mysqli_query($con,$sql);
if(!$result)
{
  echo "error ";
  echo mysqli_error($con);
}
else{
//----- Uppdate No of assigned cases for particular judge------

//$EmailJR = 'abc@mm.com';
$sql="select No_of_ass_cases, EmailJR from Judge_Registration where EmailJR
 = '$EmailJR' ";
$result = mysqli_query($con,$sql);
$rows= mysqli_num_rows($result);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $r[]=$row;
   }
$No_of_ass_cases = $r[0]['No_of_ass_cases'] - 1;
echo $No_of_ass_cases;

$sql = "UPDATE Judge_Registration SET No_of_ass_cases='$No_of_ass_cases' where EmailJR='$EmailJR'";
$result = mysqli_query($con,$sql); 

if(!$result){
  echo "error ";
  echo mysqli_error($con);
}
else{
	echo "Case Close";
	$sql = "DELETE FROM Case_Scheduling where case_id='$case_id'";
$result = mysqli_query($con,$sql); 
}
}
?>