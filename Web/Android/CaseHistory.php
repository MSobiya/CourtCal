<?php
$case_id = $_POST['case_id'];
//$case_id = 'case1';
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
  echo  "Error connecting to database";

$sql = "SELECT * FROM Form_Typer WHERE case_id = '$case_id'";

$result = mysqli_query($con,$sql);
$rows= mysqli_num_rows($result);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $r[]=$row;
  }
echo json_encode($r);
?>