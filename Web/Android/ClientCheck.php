<?php
$client_email = $_POST['client_email'];
//$case_id = 'case1';
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
  echo  "Error connecting to database";

$sql = "SELECT * FROM Client_Registration WHERE c_email = '$client_email'";

$result = mysqli_query($con,$sql);
$rows= mysqli_num_rows($result);
if($rows == 0)
	echo "Not Registered";
else
	echo json_encode($r);
?>