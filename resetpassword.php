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
		header("location:signin.php?reset=done");
		exit("updated");
		header("location:signin.php?reset=done");

		}else{
			 exit("something went wrong! please try agin later");

		}	
}

?>


<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
        <meta charset="UTF-8">
        <title>AUTON'HOME</title>
        <link href="styles/base.css" rel="stylesheet" type="text/css" />
		<link href='https://fonts.googleapis.com/css?family=Bree Serif' rel='stylesheet'>
		<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
		<script type="text/javascript">
			function checkPassword(form) { 
               var password1 = document.getElementById("password1").value;
               var password2 = document.getElementById("password2").value; 
     
               if (password1 !== password2) { 
                    alert ("\nPassword did not match: Please try again...") 
                    return false; 
                } 
  
                // If same return True. 
                else{  
                    return true; 
                } 
            }
		</script>
</head>
</head>
<body bgcolor="lightblue">
<div align="center" style="margin-top: 200px;">
<h1> Please Enter the New Password </h1>
<div class= "resetpwd">
<form method="POST" onsubmit="return checkPassword(this)" >
	<input type="password" name="newpwd" placeholder="New Password" id="password1"></input>
	<br><br>
	<input type="password" name="confirmpwd" placeholder="Confirm Password" id="password2"></input><br><br>
	<input type="submit" value="Reset" id="resetpassword" ></input>
</form></div>

</div>

</form>
</body>
</html>