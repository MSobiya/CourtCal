<?php
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
{
  echo  "Error connecting to database";

}
$selected_sections = [];
if(isset($_POST['btn_sections'])) 
{
    $selected = $_POST['checkboxvar'];
    for ($i=0; $i < count($selected) ; $i++) { 
    	//print_r($selected[$i]);
    	$sql="select * from IPC where Title='$selected[$i]';";
    	$result = mysqli_query($con,$sql);
    	echo '<br>'.$selected[$i];

    	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
	  		array_push($selected_sections, $row['Sections']);
	  		echo '<br>'.$row['Sections']. ' = ' . $row['Description'];
    }
}
/*for ($i=0; $i < count($selected_sections) ; $i++) { 
	echo '<br>'.$selected_sections[$i];
}*/


/*$sql="select Sections from IPC where Title='$selected[1]';";
$result = mysqli_query($con,$sql);
$rows= mysqli_num_rows($result);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $r[]=$row;
    }

    print_r($r);*/
}
?>