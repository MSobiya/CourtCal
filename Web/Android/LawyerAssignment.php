    <?php
    $EmailLR = $_POST['email'];
    $case_id = $_POST["case_id"];
    $client_email = $_POST["client_email"];
    $fees_status = $_POST["fees_status"];
  
    $user = "root";  
    $password = "root";  
    $host ="localhost";  
    $db_name ="COURTCAL";  
    $con = mysqli_connect($host,$user,$password,$db_name);  
    $sql = "insert into Lawyer_Assignment(case_id, EmailLR, c_email, fees_status) values('$case_id', '$EmailLR', '$client_email', '$fees_status');";  
    if(mysqli_query($con,$sql))  
    {  
        //echo "Case Successfully Registered";
        //$case_id = '0/PW/2019';
        //$scheduling_time = '';

        $sql = "SELECT scheduling_time FROM Case_Scheduling WHERE case_id='$case_id';";

        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);

        $scheduling_time = $row['scheduling_time'];
        $msg = "Hello ".$EmailLR.".<br>Your Hearing Time for case ".$case_id." is ".$scheduling_time;
        //echo $msg;

//-------Notification Through Email-----------------------
if($scheduling_time != ''){
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
    $mail->Username = "courtcal44@gmail.com";
    $mail->Password = "Courtcal123";
    $mail->SetFrom("courtcal44@gmail.com");
    $mail->Subject = "Scheduling Notification";
    $mail->Body = $msg;
    //$mail->AddAddress('sobiyasardar@gmail.com');
    $mail->AddAddress($EmailLR);


 if(!$mail->Send())
    echo "Mailer Error: " . $mail->ErrorInfo;
 else
    $result = 'mail sended';
}
echo $scheduling_time;
    }
    else   
    {  
        //echo "Not Inserted";
        echo "some error occured in php".mysqli_error($con);  
    }  
    mysqli_close($con);  
    ?>   

