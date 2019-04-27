    <?php
    $fNameCR = $_POST["fNameCR"];  
    $mNameCR = $_POST["mNameCR"];
    $lNameCR = $_POST["lNameCR"];
    $NameCR = $fNameCR." ".$mNameCR." ".$lNameCR;
    $EmailCR = $_POST["EmailCR"];
    $PhnCR = $_POST["PhnCR"];
    $AadharCR = $_POST["AadharCR"];
    $AddressCR = $_POST["AddressCR"];
    $AdCityCR = $_POST["AdCityCR"];
    $AdPincodeCR = $_POST["AdPincodeCR"];
    $AdStateCR = $_POST["AdStateCR"];
    $CourtAddressCR = $_POST["CourtAddressCR"];
    $CourtAdCityCR = $_POST["CourtAdCityCR"];
    $CourtAdPincodeCR = $_POST["CourtAdPincodeCR"];
    $CourtAdStateCR = $_POST["CourtAdStateCR"];
    $GenderCR = $_POST["GenderCR"];
    $DobCR = $_POST["DobCR"];
    $PasswordCR = $_POST["PasswordCR"];
  
    $user = "root";  
    $password = "root";  
    $host ="localhost";  
    $db_name ="COURTCAL";  
    $con = mysqli_connect($host,$user,$password,$db_name);  
    $sql = "insert into Court_Registration values('".$NameCR."','".$EmailCR."','".$PhnCR."','".$AadharCR."','".$AddressCR."','".$AdCityCR."','".$AdPincodeCR."','".$AdStateCR."','".$CourtAddressCR."','".$CourtAdCityCR."','".$CourtAdPincodeCR."','".$CourtAdStateCR."','".$GenderCR."','".$DobCR."','".$PasswordCR."');";  
    if(mysqli_query($con,$sql))  
    {  
        echo "Data inserted successfully....";  
    }  
    else   
    {  
        echo "some error occured in php".mysql_error();  
    }  
    mysqli_close($con);  
    ?>   

