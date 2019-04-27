<?php
	session_start();
	$email = $_GET['email'];
	$_SESSION['email'] = $email;

	//echo "string";
	//echo "string".$email;
	require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
	require '/usr/share/php/libphp-phpmailer/class.smtp.php';
	$rndno=rand(1000, 9999);
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "farhatsardar9@gmail.com";
	$mail->Password = "password";
	$mail->SetFrom("xyz@gmail.com");
	$mail->Subject = "OTP";
	$mail->Body = $rndno;
	$mail->AddAddress($email);


 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
 	 //$_SESSION['email']=$_POST['email'];
 		$_SESSION['email'] = $email;

     $_SESSION['otp']=$rndno;
    echo "Message has been sent";
    //header( "Location: verify_otp.php" );
 }
?>
