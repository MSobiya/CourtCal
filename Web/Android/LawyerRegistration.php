    <?php
    $fNameLR = $_POST["fNameLR"];  
    $mNameLR = $_POST["mNameLR"];
    $lNameLR = $_POST["lNameLR"];
    $NameLR = $fNameLR." ".$mNameLR." ".$lNameLR;
    $EmailLR = $_POST["EmailLR"];
    $PhnLR = $_POST["PhnLR"];
    $AadharLR = $_POST["AadharLR"];
    $AddressLR = $_POST["AddressLR"];
    $AdCityLR = $_POST["AdCityLR"];
    $AdPincodeLR = $_POST["AdPincodeLR"];
    $AdStateLR = $_POST["AdStateLR"];
    //$EnrollNoLR = $_POST["EnrollNoLR"];
    $GenderLR = $_POST["GenderLR"];
    $DobLR = $_POST["DobLR"];
    //$SpclLR = $_POST["SpclLR"];
    $PasswordLR = $_POST["PasswordLR"];
  
    $user = "root";  
    $password = "root";  
    $host ="localhost";  
    $db_name ="COURTCAL";  
    $con = mysqli_connect($host,$user,$password,$db_name);  
    $sql = "insert into Lawyer_Registration values('".$NameLR."','".$EmailLR."','".$PhnLR."','".$AadharLR."','".$AddressLR."','".$AdCityLR."','".$AdPincodeLR."','".$AdStateLR."','".$GenderLR."','".$DobLR."','".$PasswordLR."');";  
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

