<?php
$EmailLR = $_POST['EmailLR'];
//$EmailJR = 'farhatsardar9@gmail.com';
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
  echo  "Error connecting to database";

//Select All new cases which are assigned to particular judge
$sql = "SELECT case_id, EmailLR FROM Lawyer_Assignment where EmailLR='$EmailLR' and case_id in (SELECT case_id FROM Form_FIR WHERE case_status='RUNNING_CASE')";

//$sql = "SELECT case_id, EmailJR FROM Case_Assignment";
$result = mysqli_query($con,$sql);
$rows= mysqli_num_rows($result);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $r[]=$row;
  }
if(!$result)
{
  echo "error ";
  echo mysqli_error($con);
   //echo $_SESSION['spcl'];
}
else
	echo json_encode($r);
?>
