<?php
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$con = mysqli_connect("localhost","root","root","COURTCAL");
if(!$con)
  echo  "Error connecting to database";
else{
	if($email == 'admin' and $password == 'admin')
		echo "OK Court";
	else{
		if($role == 'Judge'){
		$sql="select * from Judge_Registration where EmailJR='$email' and PasswordJR='$password';";
		$result = mysqli_query($con,$sql);
		$rows= mysqli_num_rows($result);
		if(!$result)
		  echo mysqli_error($con);

		/*while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
		      $r[]=$row;
		    }*/
		elseif($rows == 1)
			echo "OK Judge";
		else
			echo "NOT OK";
			//echo $email." ".$password;
	}
	elseif ($role == 'Lawyer') {
		$sql="select * from Lawyer_Registration where EmailLR='$email' and PasswordLR='$password';";
		$result = mysqli_query($con,$sql);
		$rows= mysqli_num_rows($result);
		if(!$result)
		  echo mysqli_error($con);

		/*while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
		      $r[]=$row;
		    }*/
		elseif($rows == 1)
			echo "OK Lawyer";
		else
			echo "NOT OK";
	}
	 }
}
?>