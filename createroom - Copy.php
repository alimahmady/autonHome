<?php 


session_start();
//require_once('connections/connection.php');
if ($_SESSION["login"]!=$_GET["id"]) {
	header("location:plogin");
}

$id = $_GET["id"];

if(isset($_POST["RoomName"])){
	$RoomName=$_POST["RoomName"];
	$DeviceName=$_POST["DeviceName"];
	$DeviceType=$_POST["DeviceType"];


	$id = $_GET["id"];

$conn = mysqli_connect("localhost","root","","auton_home");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


$sql = "INSERT INTO room (room_name,user_id)
VALUES ('$RoomName','$id')";
$sql2 = "INSERT INTO device (device_name,device_type,room_name)
VALUES ('$DeviceName','$DeviceType','$RoomName')";


if ($conn->query($sql) && $conn->query($sql2)) {

   header("location:selectmodifyroom.php?id=$id");

} else {
    echo "Incorrect action";

}



}

$conx = mysqli_connect("localhost","root","","auton_home");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sqlx = "SELECT * FROM profile where user_id='".$id."'";
$image_sql = mysqli_query($conx, $sqlx);
$row_image = mysqli_fetch_assoc($image_sql);

$image = $row_image["image"];




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
					<img src="<?php echo $image; ?>"  class="center">
					<li class="active"><a href="youraccount.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user"></i>My Account</a></li>
					<li><a href="adult_home.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-home"></i>House</a></li>
					<ul>
						<li><a href="adult_livingroom.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-couch"></i>Livingroom</a></li>
						<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-bed"></i>Bedroom</a></li>
					</ul>
					<li><a href="analytics.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chart-pie"></i>Analytic</a></li>
					<li><a href="settings.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-cog"></i>Settings</a></li>
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
					<p class="signout"><a href="confirmationlogout.php?id=<?php echo $id; ?>">sign out</a><i class="fas fa-sign-out-alt"></i></p> 
				</ul>
            </div>
            <div class="main">
				<div class="title">
					<h1>Create a room</h1>
				</div>
				<div class="subtitle">
					<h2>Add devices to your new room:</h2>
					<br>
				</div>
				<div class="content">
					<br>
					<form class="form" action="" method="POST">
					<div class="leftcontent">
						<table>
							<tr>
								<td><label for="RoomName"><p align="left">Room name:</p></label></td>
								<td><input id="RoomName" name="RoomName" type="text" minlength="3" maxlength="15" required></td>
							</tr>
							<tr>
								<td><label for="DeviceName"><p align="left" >Device name:</p></label></td>
								<td><input id="DeviceName" name="DeviceName" minlength="3" maxlength="15" required></td>
							</tr>									
						</table>						
					</div>
					<div class="rightcontent">
						<br>
						<p> Device type:</p>
						<br>
						<select id="DeviceType" name="DeviceType">
						<option value="light">Light switch</option>
						<option value="temperature">Temperature controller</option>
						<option value="heater">Heater</option>
						<option value="airconditionner">Air conditonner</option>
						<option value="shutters">Shutters switch</option>
						<option value="speaker">Speakers</option>
						<option value="TV">TV device</option>
						</select>
<br>
<br>

						<select id="user" name="user">

						<option value="ahmad">Light switch</option>
						
						</select>
						<br>
						<br>
						<input class="submit" id="newroom" type="submit" value="Create" >
						<br>
						<br>

					</div>
					</form>
				</div>
            </div>
            <div class="footer">
				<p><a href="companyinfo.html">Company information</a></p>
				<p><a href="generalcondition.html">General conditions</a></p>
				<p><a href="customeragreement.html">Customer Agreement</a></p>
				<p><a href="contactus.html">Contact us</a></p>
            </div>
        </div>

        <script src="script/iemobile-fix.js" type="text/javascript"></script>
    </body>
</html>