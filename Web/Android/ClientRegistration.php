    <?php
    $nameCR = $_POST['nameCR'];
    $EmailCR = $_POST["EmailCR"];
    $PhnCR = $_POST["PhnCR"];
    $AadharCR = $_POST["AadharCR"];
    $AddressCR = $_POST["AddressCR"];
    $GenderCR = $_POST["GenderCR"];
  
    $user = "root";  
    $password = "root";  
    $host ="localhost";  
    $db_name ="COURTCAL";  
    $con = mysqli_connect($host,$user,$password,$db_name);  
    $sql = "insert into Client_Registration(c_name, c_email, c_phn, c_address, c_aadhar, c_gender) values('$nameCR', '$EmailCR', '$PhnCR', '$AddressCR', '$AadharCR', '$GenderCR');";  
    if(mysqli_query($con,$sql))  
    {  
        echo "Data inserted successfully....";  
    }  
    else   
    {  
        echo "Not Inserted";
        //echo "some error occured in php".mysqli_error($con);  
    }  
    mysqli_close($con);  
    ?>   

