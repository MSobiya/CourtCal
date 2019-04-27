<?php
session_start();

//echo $_SESSION['l_uname'];
//echo $_SESSION['l_pwd'];
//echo count($_SESSION);

unset($_SESSION['gen_id']);
unset($_SESSION['spcl']);
unset($_SESSION['email']);
unset($_SESSION['otp']);
unset($_SESSION['password']);
unset($_SESSION['case_id']);
unset($_SESSION['case_title']);
unset($_SESSION['no_of_acc_persons']);
unset($_SESSION['cs_id']);

//echo count($_SESSION);

// destroy the session
session_destroy(); 

//echo count($_SESSION);
header('Location: login.php');
?>
