<?php 

session_start();
//require_once('connections/connection.php');
if ($_SESSION["login"]!=$_GET["id"]) {
	header("location:plogin");
}

$id = $_GET["id"];
$uid = $_GET["uid"];

$con = mysqli_connect("localhost","root","","auton_home");
$sql = "select * from users where id='$uid'";
$sql2 = mysqli_query($con,$sql);
$sqlfetch= mysqli_fetch_assoc($sql2);

$uname = "select * from profile where user_id='$uid'";
$uname_q = mysqli_query($con,$uname);
$uname_q1= mysqli_fetch_assoc($uname_q);



if (isset($_POST["newmode"])) {
$umode= $_POST["newmode"];

$newm_sql="update users set user_type='$umode' where id='$uid'";
$newm_qu= mysqli_query($con,$newm_sql);
if($newm_qu){
echo "User Has Been Updated !";
header("location:modifyuser.php?id=$id&uid=$uid");


}
else echo "Not Updated !";



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
                <p><a href="index.php" style='color:#0b4d85'>Autom'Home</a></p>
            </div>
            <div class="navigationbar">
                <ul class="mainmenu">
					<img src="images/mec.jpg"  class="center">
					<li class="active"><a href="youraccount.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user"></i>My Account</a></li>
					<li><a href="home.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-home"></i>House</a></li>
					<ul>
						<li><a href="livingroom.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-couch"></i>Livingroom</a></li>
						<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-bed"></i>Bedroom</a></li>
					</ul>
					<li><a href="analytics.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chart-pie"></i>Analytic</a></li>
					<li><a href="settings.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-cog"></i>Settings</a></li>
				</ul> 
            </div>
            <div class="copyright">
                 © Copyright - All right reserved
            </div>
        </div>
        <div class="rightcolumn">
            <div class="header">
				<ul>
					<p class="language"><a href="#" style='color:#0b4d85'>EN/FR</a></p>  
					<p class="signout"><a href="confirmationlogout.html">sign out</a><i class="fas fa-sign-out-alt"></i></p> 
				</ul>
            </div>
			<div class="main">
				<div class="title">
					<h1>Modify an user account</h1>
				</div>
				<div class="subtitle">
					<h2></h2>
					<br>
				</div>
				<div class="content">
					<form method="post">
						<table>
							<tr>
								<td>
								<h3 align="left"><img src="icon/user.png" width="60" height="60" />  <?php echo $uname_q1["name"]; echo " "; echo $uname_q1["lastname"]; ?>  :</h3></td>
							</tr>
							<tr>
								<td>
								<h3 align="left"> Current Mode : <?php  if($sqlfetch["user_type"]==null){echo "Administrator"; } else { echo $sqlfetch["user_type"]; } ?> </h3>
								</td>
							</tr>
							<tr>
								<td>
								<h3 align="left"> New Mode : </h3>
								<select name="newmode">
								<option value="Adult">Adult</option>
								<option value="Guest">Guest</option>
								<option value="Child">Child</option>
								</select>
								</td>
								<td>
								<br>	
								<input type="submit" value="submit" class="savechange"></input>
								</td>
							</tr>
						</table>
					</form>
				</div>
            </div>
            <div class="footer">
				<p><a href="companyinfo.html" style='color:#0b4d85'>Company information</a></p>
				<p><a href="generalcondition.html" style='color:#0b4d85'>General conditions</a></p>
				<p><a href="customeragreement.html" style='color:#0b4d85'>Customer Agreement</a></p>
				<p><a href="contactus.html" style='color:#0b4d85'>Contact us</a></p>
            </div>
        </div>
        <script src="script/iemobile-fix.js" type="text/javascript"></script>
    </body>
</html>



