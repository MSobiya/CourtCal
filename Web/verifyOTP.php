<?php
session_start();

$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
{
  echo  "Error connecting to database";

}
/*require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
require '/usr/share/php/libphp-phpmailer/class.smtp.php';
$mail = new PHPMailer();

$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
*/
//if(isset($_POST['save']))
//{
$rno=$_SESSION['otp'];
//$urno=$_POST['otpvalue'];
$urno = $_GET['urno'];
$spcl = $_GET['spcl'];
$_SESSION['spcl'] = $spcl;

if(!strcmp($rno,$urno)){
	if($spcl == 'Police'){
		$sql = "select * from Registration where specialization = 'Police' ";
		$result = mysqli_query($con,$sql);
		$rows = mysqli_num_rows($result)+1;
		$gen_id = 'P'.$rows;
		$_SESSION['gen_id'] = $gen_id;

	}
	if($spcl == 'Stenotypist'){
		$sql = "select * from Registration where specialization = 'Stenotypist' ";
		$result = mysqli_query($con,$sql);
		$rows = mysqli_num_rows($result)+1;
		$gen_id = 'T'.$rows;
		$_SESSION['gen_id'] = $gen_id;

	}
	echo '<div class="col-sm-7 col-sm-offset-1">
          <div class="form-group label-floating">
	<label><h3 id="gen_id">Your ID: '.$gen_id.'</h3></label>
	</div>
	</div>';
	//echo 'Your ID: M'.$rows;
	//echo "Validation Success";
}
else
	echo "<h4>Invalid OTP. Please Check it once again</h4>";


?>
