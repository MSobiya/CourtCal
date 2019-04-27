<?php
$EmailJR = $_POST['EmailJR'];
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
  echo  "Error connecting to database";

//Select All new cases which are assigned to particular judge
$sql = "SELECT case_id, EmailJR FROM Case_Assignment where EmailJR='$EmailJR' and case_id in (SELECT case_id FROM Form_FIR WHERE case_status='NEW_CASE')";
//$sql = "select case_id from Form_FIR where case_id = 'case1'; ";

$result = mysqli_query($con,$sql);
  $rows= mysqli_num_rows($result);

  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $r[]=$row;
    }
echo json_encode($r);
?>