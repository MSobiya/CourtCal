<?php
session_start();
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
{
  echo  "Error connecting to database";

}

//-------------------------------------------For Finish Button----------------------------------------
if(isset($_POST['btn_finish'])){
// On submitting form below function will execute.

$gen_id = $_SESSION['gen_id'];
$name = $_POST['f_name'].' '.$_POST['l_name'];
//$name =$_POST['f_name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$address = $_POST['address'];
//$specialization = $_POST['specialization'];
$specialization = $_SESSION['spcl'];
//$id = $_POST['id'];
$rank = $_POST['rank'];
$posting_area = $_POST['posting_area'];
$aadhar = $_POST['aadhar'];
$phn_no = $_POST['phn_no'];
$email = $_POST['email'];
$password = $_POST['password'];
//$pwd=md5($pwd);

$_SESSION['password'] = $password;

 $sql = "insert into Registration (gen_id, name, gender, dob, address, specialization, rank,posting_area, aadhar, phn_no, email, password) values ('$gen_id','$name','$gender','$dob','$address', '$specialization','$rank', $posting_area, '$aadhar','$phn_no','$email','$password')";
 //$sql = "insert into Registration (gen_id, name, gender, dob, address, specialization, id, rank,posting_area, aadhar, phn_no, email, password) values ('id1', 'ss ss','fem','2018-09-24','abcfdd', 'police',12,'3', 122, '1256','1234566', 'sos@m.com','123456')";

$result = mysqli_query($con,$sql);


if(!$result)
{
  echo "error ";
  echo mysqli_error($con);
   //echo $_SESSION['spcl'];
}
else
{
  if($specialization == 'Police')
    header('Location: Police.php');

  if($specialization == 'Stenotypist')
    header('Location: Stenotypist.php');
      //echo "<br/>Thanks for Registration";

}

}


//---------------------------------------------------Send OTP-----------------------------------------------
// if(isset($_POST['btn_otp'])){
// session_start();
// require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
// require '/usr/share/php/libphp-phpmailer/class.smtp.php';
// $rndno=rand(1000, 9999);
// $mail = new PHPMailer(); // create a new object
// $mail->IsSMTP(); // enable SMTP
// //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
// $mail->SMTPAuth = true; // authentication enabled
// $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
// $mail->Host = "smtp.gmail.com";
// $mail->Port = 465; // or 587
// $mail->IsHTML(true);
// $mail->Username = "farhatsardar9@gmail.com";
// $mail->Password = "sobiya786";
// $mail->SetFrom("farhatsardar9@gmail.com");
// $mail->Subject = "OTP";
// $mail->Body = $rndno;
// $mail->AddAddress($_POST['email']);

// if(!$mail->Send()) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
//  } else {
//     echo "Message has been sent";
//     $_SESSION['email']=$_POST['email'];
//     $_SESSION['otp']=$rndno;
    

//     //echo "hideAllTabs();";
//     echo "run();";
//     header( "Location: Register.php");

//      //header("Location: Register.php#verification");	
    
//     //header("Location: ".$config['Register.php']."Register.php#verification");
//  }

// }





//-------------------------------------------Register FIR-----------------------------------------------
if(isset($_POST['btn_fir'])){

//$case_id=$_POST['case_id'];
$nops = $_POST['nops'];
$dsops = $_POST['dsops'];
$pops = $_POST['pops'];
$phn_ps = $_POST['phn_ps'];
$xname = $_POST['xname'];
$xphn = $_POST['xphn'];
$xaddress = $_POST['xaddress'];
$xemail=$_POST['xemail'];
$toc=date('Y-m-d H:i:s');
//$case_title = $_POST['case_title'];
$case_desc = $_POST['case_desc'];

$sql = "SELECT * FROM Form_FIR";
$result = mysqli_query($con,$sql);
$rows= mysqli_num_rows($result);


$case_id = $rows.'/PW/'.date('Y');

$_SESSION['case_id'] = $case_id;

$sql = "insert into Form_FIR (case_id, nops, dsops, pops, phn_ps, xname, xphn, xaddress ,xemail, toc, case_desc) values ('$case_id','$nops','$dsops','$pops','$phn_ps', '$xname',$xphn,'$xaddress', '$xemail', '$toc','$case_desc')";
 //$sql = "insert into Registration (gen_id, name, gender, dob, address, specialization, id, rank,posting_area, aadhar, phn_no, email, password) values ('id1', 'ss ss','fem','2018-09-24','abcfdd', 'police',12,'3', 122, '1256','1234566', 'sos@m.com','123456')";

$result = mysqli_query($con,$sql);


if(!$result)
{
  echo "error ";
  echo mysqli_error($con);
}
else{
  echo "<br/>FIR Registered Successfully";


//------------------------------Case Assignment------------------------------------------------------
  
  //Get email id of judge who assinged with less No of cases
  $sql="select No_of_ass_cases, EmailJR from Judge_Registration where No_of_ass_cases = (select min(No_of_ass_cases) from Judge_Registration)";
  $result = mysqli_query($con,$sql);
  $rows= mysqli_num_rows($result);

  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $r[]=$row;
    }
$assing_judge = 'NOT_ASSIGNED';
//We allowed 10 cases per judge, by using this if statment we check whether judge is free or not. It means if at least one judge has No_of_assigned_case < 10 He/She is free.

// $r[0] --> 0th row,   $r[0]['No_of_ass_cases'] --> 0th row ka No_of_ass_cases column
    if($r[0]['No_of_ass_cases'] < 10){
      $assing_judge = $r[0]['EmailJR'];
      $update_cases = $r[0]['No_of_ass_cases'] + 1;

      $sql = "UPDATE Judge_Registration SET No_of_ass_cases='$update_cases' where EmailJR='$assing_judge'";
$result = mysqli_query($con,$sql);
    }
    //echo $assing_judge;

//Insert assigned detail into Case_Assignment table
    $sql = "insert into Case_Assignment (case_id, EmailJR) values ('$case_id','$assing_judge')";

    $result = mysqli_query($con,$sql);

    if(!$result){
  echo "error ";
  echo mysqli_error($con);
}
//--------------------------------Select Sections-------------------
header("Location:FIR_Form_Section.php");
}
}



//---------------------------------------------------Stenotypist-----------------------------------------------
if(isset($_POST['btn_stenotypist'])){
//$id = $_SESSION['id'];
$case_id = $_POST['case_id'];
$start_time = $_POST['start_time'];
$judgement = $_POST['judgement'];
$gen_id = $_SESSION['gen_id'];

$sql = "insert into Form_Typer (id, case_id, start_time, judgement) values ('$gen_id','$case_id','$start_time','$judgement')";
 //$sql = "insert into Registration (gen_id, name, gender, dob, address, specialization, id, rank,posting_area, aadhar, phn_no, email, password) values ('id1', 'ss ss','fem','2018-09-24','abcfdd', 'police',12,'3', 122, '1256','1234566', 'sos@m.com','123456')";

$result = mysqli_query($con,$sql);


if(!$result)
{
  echo "error ";
  echo mysqli_error($con);
}
else
  //echo "<br/>Successfully Recorded";
  header('Location: Stenotypist.php');

}

//-----------------------------------------Login-----------------------------------------------------

if(isset($_POST['btn_login']))
{
$gen_id = $_POST['gen_id'];
$password = $_POST['password'];

$_SESSION['gen_id'] = $gen_id;
$_SESSION['password'] = $password;

if(!$con)
{
  echo  "Error connecting to database";
}
//echo "string";
$sql="select * from Registration where gen_id='$gen_id' and password='$password'";
$result = mysqli_query($con,$sql);
$rows= mysqli_num_rows($result);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $r[]=$row;
    }
$specialization = $r[0]['specialization'];
$_SESSION['spcl'] = $specialization;
if($rows == 1 and $specialization == 'Police')
    header('Location: Police.php');

elseif($rows == 1 and $specialization == 'Stenotypist')
    header('Location: Stenotypist.php');
else
  header("Location:login.php");
}
?>

