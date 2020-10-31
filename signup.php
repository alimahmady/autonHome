<?php


if (isset($_POST["Age"])) {
	$Firstname = $_POST["Firstname"];
	$LastName = $_POST["LastName"];
	$Age = $_POST["Age"];
	$EmailAddress = $_POST["EmailAddress"];
	$City = $_POST["City"];
	$Address = $_POST["Address"];
	$ZipCode = $_POST["ZipCode"];
	$NewPwd	= $_POST["NewPwd"];
	$House_ID =$_POST["House_ID"];
$conn = new mysqli("localhost", "root", "", "auton_home");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO profile (user_id,name,lastname,Age,email,city,zipcode,house_id,Address)
VALUES (null,'$Firstname','$LastName','$Age','$EmailAddress','$City','$ZipCode','$House_ID','$Address')";

mysqli_query($conn,$sql);

$xsqlF= "select * from profile where email='$EmailAddress'";
$newsql= mysqli_query($conn,$xsqlF);
$new2sql= mysqli_fetch_assoc($newsql);
$uid = $new2sql["user_id"];



$sql2 = "INSERT INTO users (id,type,email,password) VALUES ($uid,null,'$EmailAddress','$NewPwd')";




if ( $conn->query($sql2)) {
    header("location:signup.php?done=true");
} else {
    echo "Please Complete the Form!";
}

$conn->close();

}

?>

<html>
<head>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
        <meta charset="UTF-8">
        <title>AUTON'HOME</title>
        <link href="base.css" rel="stylesheet" type="text/css" />
		<link href='https://fonts.googleapis.com/css?family=Bree Serif' rel='stylesheet'>
		<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
		<script type="text/javascript">
			function checkPassword(form) { 
               var password1 = document.getElementById("NewPwd").value;
               var password2 = document.getElementById("ConfirmPwd").value; 
     
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

<body>

	<div class='other_login'>
	<?php if(isset($_GET["done"])) { ?>
		<h1  align="center" style="background-color:yellow; color:green;">Your Account Has Been Successfully Created! </h1>
<?php   } ?> 
		<ul>
		

			<li><a href="signin.php">Sign in</a></li>&nbsp;
			<li><a href="forgotpwd.php">Forgot password ? </a></li>
		</ul>
	</div>
<div id='logo'>
	<img src="logo.png" width="400" height="420">
</div>
<div class="register">
    <form class="form" action="" method="POST" onsubmit="return checkPassword(this)">
		<table>
			<tr>
				<td><label for="FirstName" ><p align="left" >First name:<p></label></td>
				<td><input id="FirstName" name="Firstname" type="text" minlength="3" maxlength="15" required> </input></td>
			</tr>
			<tr>
				<td><label for="LastName"><p align="left" >Last name:</p></label></td>
				<td><input id="LastName" name="LastName" type="text" minlength="3" maxlength="15" required></input></td>
			</tr>							
			<tr>
				<td><label for="Age"><p align="left" >Age:</p></label></td>
				<td><input id="Age" name="Age" type="int" minlength="1" maxlength="3" required></input></td>
			</tr>							
			<tr>
				<td><label for="EmailAddress"><p align="left">Email address:</p></label></td>
				<td><input id="EmailAddress"  name="EmailAddress" type="email" minlength="3" maxlength="40" required></input></td>
			</tr>
			<tr>
				<td><label for="City"><p align="left" >City:</p></label></td>
				<td><input id="City" name="City" type="text" minlength="3" maxlength="30" required></input></td>
			</tr>
			<tr>
				<td><label for="Address"><p align="left" >Postal address:</p></label></td>
				<td><input id="Address" name="Address" type="text" minlength="3" maxlength="50" required></input></td>
			</tr>							
			<tr>
				<td><label for="ZipCode"><p align="left" >Zip code:</p></label></td>
				<td><input id="ZipCode" name="ZipCode" type="int"></input></td>
			</tr>		
			<tr>
				<td><label for="NewPwd"><p align="left" >New password:</p></label></td>
				<td><input id="NewPwd" name="NewPwd" type="password" minlength="3" required></input></td>
			</tr>
			<tr>
				<td><label for="ConfirmPwd"><p align="left" >Confirm password:</p></label></td>
				<td><input id="ConfirmPwd" name="ConfirmPwd" type="password" minlength="3" required></input></td>
			</tr>
			<tr>
				<td><label for="House_ID"><p align="left" >House ID:</p></label></td>
				<td><input id="House_ID" name="House_ID" type="text" minlength="5" required></input></td>
			</tr>
			<tr>
				<td></td>
				<td><input id='register'type="submit" value="Create account"></td>
			</tr>		
		</table>
	</form>
	</div>
</body>
</html>