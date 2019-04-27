    <?php
    $fNameJR = $_POST["fNameJR"];  
    $mNameJR = $_POST["mNameJR"];
    $lNameJR = $_POST["lNameJR"];
    $NameJR = $fNameJR." ".$mNameJR." ".$lNameJR;
    $EmailJR = $_POST["EmailJR"];
    $PhnJR = $_POST["PhnJR"];
    $AadharJR = $_POST["AadharJR"];
    $AddressJR = $_POST["AddressJR"];
    $AdCityJR = $_POST["AdCityJR"];
    $AdPincodeJR = $_POST["AdPincodeJR"];
    $AdStateJR = $_POST["AdStateJR"];
    //$EnrollNoJR = $_POST["EnrollNoJR"];
    $GenderJR = $_POST["GenderJR"];
    $DobJR = $_POST["DobJR"];
    //$SpclJR = $_POST["SpclJR"];
    $PasswordJR = $_POST["PasswordJR"];
  
    $user = "root";  
    $password = "root";  
    $host ="localhost";  
    $db_name ="COURTCAL";  
    $con = mysqli_connect($host,$user,$password,$db_name);  
    $sql = "insert into Judge_Registration(NameJR, EmailJR, PhnJR, AadharJR, AddressJR, AdCityJR, AdPincodeJR, AdStateJR, GenderJR, DobJR, PasswordJR) values('$NameJR', '$EmailJR', '$PhnJR', '$AadharJR', '$AddressJR', '$AdCityJR', '$AdPincodeJR', '$AdStateJR', '$GenderJR', '$DobJR', '$PasswordJR');";  
    if(mysqli_query($con,$sql))  
    {  
        echo "Data inserted successfully....";  
    }  
    else   
    {  
        echo "some error occured in php".mysqli_error($con);  
    }  
    mysqli_close($con);  
    ?>   

