<?php 
session_start();
//require_once('connections/connection.php');
if ($_SESSION["login"]!=$_GET["id"]) {
	header("location:plogin");
}

$id = $_GET["id"];

if ($_POST["NewPwd"]) {

	$email = $_POST["EmailAddress"];
	$cpass = $_POST["CurrentPwd"];
	$newpass = $_POST["NewPwd"];
	$con = mysqli_connect("localhost","root","","auton_home");
	$sql ="select * from users where email='$email'";
	$sqlq = mysqli_query($con,$sql);
	$sqlf = mysqli_fetch_assoc($sqlq);
	$pp= $sqlf["password"];
	if($cpass==$pp){
		$x="update users set password='$newpass' where email='$email'";

		if(mysqli_query($con,$x)){
			header("location:changepwd.php?id=$id&change=done");

		}
		else{
			header("location:changepwd.php?id=$id&nochange=done");
		}
	}else{
		header("location:changepwd.php?id=$id&nochange=done");
	}

	

	
}





?>



<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
        <meta charset="UTF-8">
        <title>AUTON'HOME</title>
        <link href="base.css" rel="stylesheet" type="text/css" />
		<link href='https://fonts.googleapis.com/css?family=Bree Serif' rel='stylesheet'>
		<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    </head>
    <body>
        <div class="leftcolumn">
            <div class="companyname">
                <p>Auton'Home</p>
            </div>
            <div class="navigationbar">
                <ul class="mainmenu">
					<img src="icon/pass.png"  class="center">
					
					
					<?php if($_SESSION["user_type"]==null ||$_SESSION["user_type"]=='Adult' ||$_SESSION["user_type"]=='Guest' ){ ?>
					<li class="active"><a href="youraccount.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user"></i>My Account</a></li>
					<?php } ?>
					<li><a href="Adult_home.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-home"></i>House</a></li>
					<ul>
						<li><a href="adult_livingroom.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-couch"></i>Livingroom</a></li>
						
					<?php if($_SESSION["user_type"]==null ||$_SESSION["user_type"]=='Adult'){ ?>
					<li><a href="analytics.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chart-pie"></i>Analytic</a></li>
					<?php } ?>
					<?php if($_SESSION["user_type"]==null){ ?>
					<li><a href="settings.php?id=<?php echo $id ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-cog"></i>Settings</a></li>
					<?php } ?>
				</ul> 
            </div>
            <div class="copyright">
                 © Copyright - All right reserved
            </div>
        </div>
        <div class="rightcolumn">
            <div class="header">
				<ul>
					<p class="language"><a href="#">EN/FR</a></p> 
					<p class="signout"><a href="confirmationlogout.html">sign out</a><i class="fas fa-sign-out-alt"></i></p> 
				</ul>
            </div>
            <div class="main">
				<div class="title">
					<h1>Change your password</h1>
					<?php if(isset($_GET["change"])){ ?>
					<h1 style="color:green;"> The Password Has Been Changed ! </h1>
					<?php } ?>
					<?php if(isset($_GET["nochange"])){ ?>
					<h1 style="color:red;"> Please Try Again ! </h1>
					<?php } ?>
					<img src="icon/pass.png" width=100 height=100>
				</div>
				<!-- <div class="subtitle"> -->
					<!-- <h2>Informations:</h2> -->
				<!-- </div> -->
				<div class="content">
					<form class="form" method="POST">
					<div class="leftcontent">
						<table>
							<tr>
								<td><label for="EmailAddress"><p align="left" >Email address:</p></label></td>
								<td><input id="EmailAddress" name="EmailAddress" type="email" minlength="3" maxlength="40" required></td>
							</tr>
							<tr>
								<td><label for="CurrentPwd"><p align="left" >Current password:</p></label></td>
								<td><input id="CurrentPwd" name="CurrentPwd" type="password" minlength="3" required></td>
							</tr>							
							<tr>
								<td><label for="NewPwd"><p align="left" >New password:</p></label></td>
								<td><input id="NewPwd" name="NewPwd" type="password" minlength="3" required></td>
							</tr>							
							<tr>							
								<td><label for="ConfirmPwd"><p align="left" >Confirm password:</p></label></td>
								<td><input id="ConfirmPwd" name="ConfirmPwd" type="password" minlength="3" required></td>
							</tr>		
						</table>							
					</div>
					<div class="rightcontent">
						<input class="submit" id='newpassword'type="submit" value="Change Password">						
					</div>
					</form>
				</div>
			</div>
            <div class="footer">
				<p><a href="companyinfo.php?id=<?php echo $id; ?>">Company information</a></p>
				<p><a href="generalcondition.php?id=<?php echo $id; ?>">General conditions</a></p>
				<p><a href="customeragreement.php?id=<?php echo $id; ?>">Customer Agreement</a></p>
				<p><a href="contactus.php?id=<?php echo $id; ?>">Contact us</a></p>
            </div>
        </div>

        <script src="script/iemobile-fix.js" type="text/javascript"></script>
    </body>
</html>