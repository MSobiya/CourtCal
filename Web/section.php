<?php
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
{
  echo  "Error connecting to database";

}
$sql="select DISTINCT Title from IPC;";
$result = mysqli_query($con,$sql);
$rows= mysqli_num_rows($result);
echo $rows.'<br>';
$r = [];

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      //echo '<br>'.$row['Title'];
	  array_push($r, $row['Title']);
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>IPC</title>
</head>
<body>
<form method='post' action='selected_titles.php'>
<?php for ($i=1; $i < $rows; $i++) { 
?>
<input type='checkbox' name='checkboxvar[]' value = <?php echo $r[$i];  ?> ><?php echo $r[$i]; ?><br>
<?php } ?>
<input type='submit' class='buttons' name="btn_sections"></form>
</body>
</html>