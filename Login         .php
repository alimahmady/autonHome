<?php 
session_start();


if (isset($_GET["session"])) {
  echo "<span style='color:red;'>Please Login to Your Account First!<span>";
  # code...
}
if (isset($_POST["password"])) {

$username = $_POST["username"];
$password = $_POST["password"];



$con = mysqli_connect("localhost","root","","auton");


$sql_q = "select * from users where username='".$username."' and password='".$password."'";
$result = mysqli_query($con, $sql_q);

if (mysqli_fetch_assoc($result)) {
  $_SESSION["user"] = $username;

  echo header("location:index.php?login=".$username);

  # code...
}else echo "<span style='color:red'> <br>Login Failed, Incorrect Username or Password</span>";



  

}

?>
<html>
<head>
  <title>testjb</title>
  <link href="styles/base.css" rel="stylesheet">
</head>

<body>


<div id='logo'>
	<img src="images/logo.png" width="420" height="420">
</div>

<div class='login'>
<!--p>Create an account:</p-->
      <form action="" method="POST">
          Username:<input type="text" name="username"><br>
          Password:<input type="password" name="password">
          <br>
          <input type="submit" name="submit" value="login">

</div>
<div class='other_login'>	  
<a href="sign_up.html">Sign up</a>
&nbsp;
<a href="forgot_password.html">Forgot password</a>
</div>

</body>
</html>