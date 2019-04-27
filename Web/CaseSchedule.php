<?php
$case_id = $_POST['case_id'];
$EmailJR = $_POST['EmailJR'];
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
  echo  "Error connecting to database";

$sql = "SELECT * FROM Case_Scheduling WHERE scheduling_time=(SELECT MAX(scheduling_time) FROM Case_Scheduling);";

$result = mysqli_query($con,$sql);
$rows= mysqli_num_rows($result);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $r[]=$row;
  }

//echo json_encode($r);

//--------------------If time is allocated for less than 5 cases---------------------------------
//-----------We check for 5 because we consider in a court there are 5 rooms so that at a single time 5 cases can be schedule
if($rows < 5 and $rows > 0){
	$scheduling_time = $r[0]['scheduling_time'];
}
else{
//--------------------For first scheduling----------------------------------------
	if($rows == 0)
		$datetime = strtotime(date('Y-m-d H:i:s'));
//----------- If per time 5 cases are already allocated ---------------------------------------
	elseif($rows == 5)
		$datetime = strtotime($r[0]['scheduling_time']);

	$day = date('D', $datetime);
  	$time = date('H:i', $datetime);

//select date for scheduling
 	if($day == 'Sat'){
  		$date = date('Y-m-d', $datetime);
  		$date = date('Y-m-d', strtotime($date. '+ 2 days'));
  	} elseif($day == 'Sun'){
  		$date = date('Y-m-d', $datetime);
  		$date = date('Y-m-d', strtotime($date. '+ 1 days'));
  	}else{
  		$date = date('Y-m-d', $datetime);
  	}
//select time for scheduling
  	if($time < date('H:i', strtotime('10:30')))
  		$time = date('H:i', strtotime('10:30'));
  	elseif ($time >= date('H:i', strtotime('10:30')) and $time < date('H:i', strtotime('14:00')))
  		$time = date('H:i', strtotime('14:00'));
  	elseif ($time >= date('H:i', strtotime('14:00')) and $time < date('H:i', strtotime('16:00')))
  		$time = date('H:i', strtotime('16:00'));
  	else{
  		$time = date('H:i', strtotime('10:30'));
  		$date = date('Y-m-d', strtotime($date. '+ 1 days'));
  	}

  	$scheduling_time = date('Y-m-d H:i:s', strtotime($date.' '.$time));

}
echo $scheduling_time;
$msg = "Hello ".$EmailJR.".<br>Your Hearing Time for case ".$case_id." is ".$scheduling_time;
$sql = "insert into Case_Scheduling(case_id, EmailJR, scheduling_time) values('$case_id', '$EmailJR', '$scheduling_time')";
	$result = mysqli_query($con,$sql);

	if(!$result)
  		echo mysqli_error($con);
  	else{
  		$sql = "UPDATE Form_FIR SET case_status='RUNNING_CASE' where case_id='$case_id'";
$result = mysqli_query($con,$sql);

//-------Notification Through Email-----------------------

	require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
	require '/usr/share/php/libphp-phpmailer/class.smtp.php';
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "xyz@gmail.com";
	$mail->Password = "password";
	$mail->SetFrom("xyz@gmail.com");
	$mail->Subject = "Scheduling Notification";
	$mail->Body = $msg;
	$mail->AddAddress($EmailJR);


 if(!$mail->Send())
    echo "Mailer Error: " . $mail->ErrorInfo;
else
	echo $scheduling_time;

}

?>
