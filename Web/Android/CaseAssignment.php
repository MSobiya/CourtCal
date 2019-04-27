<?php
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
  echo  "Error connecting to database";

//Get cases id which are not assigned to any judge.
$sql = "select case_id from Case_Assignment where EmailJR = 'NOT_ASSIGNED' ";
$result = mysqli_query($con,$sql);
$rows1= mysqli_num_rows($result);

  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $r1[]=$row;
   }
for ($i=0; $i < $rows1 ; $i++) {
	$r = [];
//Get email id of judge who assinged with less No of cases
  $sql="select No_of_ass_cases, EmailJR from Judge_Registration where No_of_ass_cases = (select min(No_of_ass_cases) from Judge_Registration)";
  $result = mysqli_query($con,$sql);
  $rows= mysqli_num_rows($result);

  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $r[]=$row;
    }
//echo $r1[0]['case_id'];
//We allowed 10 cases per judge, by using this if statment we check whether judge is free or not. It means if at least one judge has No_of_assigned_case < 10 He/She is free.

// $r[0] --> 0th row,   $r[0]['No_of_ass_cases'] --> 0th row ka No_of_ass_cases column
    print_r($r);
    if($r[0]['No_of_ass_cases'] < 10){
      $assing_judge = $r[0]['EmailJR'];
      $update_cases = $r[0]['No_of_ass_cases'] + 1;
    
    //echo $assing_judge;

//Update assigned detail into Case_Assignment table

$case_id = $r1[$i]['case_id'];
echo "i".$i;
echo "<br>".$case_id;
echo "<br>".$assing_judge;
echo "<br>".$update_cases;
$sql = "UPDATE Case_Assignment SET EmailJR='$assing_judge' where case_id='$case_id'";
$result = mysqli_query($con,$sql); 

    if(!$result){
  echo "error ";
  echo mysqli_error($con);
}
$sql = "UPDATE Judge_Registration SET No_of_ass_cases='$update_cases' where EmailJR='$assing_judge'";
$result = mysqli_query($con,$sql); 
if(!$result){
  echo "error ";
  echo mysqli_error($con);
}
else
	echo "Updated";
}
}


//Fetch detail from tables
$sql = "SELECT Case_Assignment.case_id, Case_Assignment.EmailJR, Judge_Registration.NameJR FROM Case_Assignment, Judge_Registration WHERE Case_Assignment.EmailJR = Judge_Registration.EmailJR";

$result = mysqli_query($con,$sql);
  $rows= mysqli_num_rows($result);

  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $r[]=$row;
    }
echo json_encode($r);
?>