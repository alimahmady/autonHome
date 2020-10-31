<?php 
session_start();


if (isset($_GET["session"])) {
  echo "<h1 align=center style='color:red; background-color: yellow;'>Please Login to Your Account !</h1>";
  # code...
}
if (isset($_POST["password"])) {

$email = $_POST["email"];
$password = $_POST["password"];



$con = mysqli_connect("localhost","root","","auton_home");


$sql_q = "select * from users where email='".$email."' and password='".$password."'";
$result = mysqli_query($con, $sql_q);

if (mysqli_fetch_assoc($result)) {

	$_SESSION["login"] = $email;


$sql = "SELECT * FROM profile where email='".$email."'";


$result = mysqli_query($con, $sql);

// Associative array
$row = mysqli_fetch_assoc($result);



$log = $row["user_id"];




	header("location:index.php?id=".$log);

}else{

 header("location:signin.php?cred=no");




}  

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
    </head>
  <title>testjb</title>
</head>

<body>
	<div class='other_login'>	  
		<ul><br>
			<li><a href="signup.php">Sign up</a></li>&nbsp;
			<li><a href="forgotpwd.php">Forgot password ? </a></li>
		</ul>
	</div>
	<div id='logo'>
		<img src="logo.png" width="400" height="420">
	</div>
	<div class='login'>
		<?php if(isset($_GET["signout"])){ ?>
			<div>
				<p style="color:green;">Successfully Singed out !</p>
			</div>
		<?php } ?>

		<?php if(isset($_GET["cred"])){ ?>
			<div>
				<p style="color:red;">Incorecct username or password !</p>
			</div>

		<?php } ?>

	<!--p>Create an account:</p-->
		<form action="" method="POST">
			<label for="Login">Login:</label>
			<br>
			<input id="Login" name="email" type="text" minlength="3" maxlength="100" required>
			<br>
			<br>
			<label for="pw">Password:</label>
			<br>
			<input id="pw" name="password" type="password" minlength="3" maxlength="100" required>
			<br>
			<br>
			<input id='submit'type="submit" value="Login">
		</form>
	</div>
</body>
</html>