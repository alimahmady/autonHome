<?php 
include("config.php");
if(!isset($_GET["code"])){

exit("can't find the page");


}
$code = $_GET["code"];
$sql = "SELECT email FROM resetpassword WHERE code='$code'";


$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) == 0) {
	echo "can't find the page corresponded to this reset code!";


}






if (isset($_POST["newpwd"])) {

$sql2 = "SELECT email FROM resetpassword WHERE code='$code'";
	$pw = $_POST["newpwd"];
	//$pw = md5($pw);
	$result2 = mysqli_query($con,$sql2);

	$row = mysqli_fetch_assoc($result2);


	$em =$row["email"];


	

	$q = mysqli_query($con,"UPDATE users SET password='$pw' where email ='$em'");
	if ($q) {


		mysqli_query($con,"DELETE FROM resetpassword where code ='$code'");
		exit("updated");

		}else{
			 exit("something went wrong! please try agin later");

		}	
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
</head>
<body bgcolor="lightblue">
<div align="center" style="margin-top: 200px;">
<h1> Pleae Enter the New Password
<form method="POST" >
	<input type="text" name="newpwd" placeholder="New Password"></input><br>
	<input type="text" name="confirmpwd" placeholder="Confirm Password"></input><br>
	<input type="submit" value="Reset"></input>
	
</form>
</div>

</form>
</body>
</html>