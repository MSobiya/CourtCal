<?php
session_start();

$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
{
  echo  "Error connecting to database";

}

$sectionvar = $_POST['sectionvar'];
$titlesvar = $_SESSION['case_title'];
$selected = "";
foreach ($sectionvar as $row) {
    $selected = $selected.$row.',';
}

$titles = "";
foreach ($titlesvar as $row) {
    $titles = $titles.$row.',';
}
// echo $selected;
$case_id = $_SESSION['case_id'];
$sql = "update Form_FIR set sections = '$selected', case_title = '$titles' where case_id='$case_id'";
$result = mysqli_query($con,$sql);



if(!$result)
{
  echo "error ";
  echo mysqli_error($con);
}
else{
  echo "<br/>sections inserted";
  header("Location:Police.php");

}
?>