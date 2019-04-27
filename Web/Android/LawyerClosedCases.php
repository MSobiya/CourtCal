<?php
$EmailLR = $_POST['EmailLR'];
//$EmailJR = 'abc@mm.com';
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
  echo  "Error connecting to database";

//Select All new cases which are assigned to particular judge
$sql = "SELECT case_id, EmailLR FROM Lawyer_Assignment where EmailLR='$EmailLR' and case_id in (SELECT case_id FROM Form_FIR WHERE case_status='CLOSED_CASE')";

//$sql = "SELECT case_id, EmailJR FROM Case_Assignment";
$result = mysqli_query($con,$sql);
  $rows= mysqli_num_rows($result);

  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $r[]=$row;
    }
echo json_encode($r);
?>
