<?php
$EmailLR = $_POST['EmailLR'];
//$EmailJR = 'abc@mm.com';
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
  echo  "Error connecting to database";
else{
//Select All new cases which are assigned to particular judge
$sql = "SELECT case_id, scheduling_time FROM Case_Scheduling where case_id in (SELECT case_id from Lawyer_Assignment WHERE EmailLR = '$EmailLR')  ";
//$sql = "select case_id from Form_FIR where case_id = 'case1'; ";


$result = mysqli_query($con,$sql);
$rows= mysqli_num_rows($result);

  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $r[]=$row;
    }
echo json_encode($r);
//echo $EmailJR;
}
?>