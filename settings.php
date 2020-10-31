<?php 





session_start();
//require_once('connections/connection.php');
if ($_SESSION["login"]!=$_GET["id"]) {
	header("location:plogin");
}

$id = $_GET["id"];


$con = mysqli_connect("localhost","root","","auton_home");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}





$sql = "SELECT * FROM profile where user_id='".$id."'";

$result = mysqli_query($con, $sql);

// Associative array
$row = mysqli_fetch_assoc($result);

$image = $row["image"];


$room = "SELECT * FROM room WHERE user_id=".$id."";

$room_result = mysqli_query($con,$room);


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
						<?php while ($room_name = mysqli_fetch_assoc($room_result)){

							$rm = $room_name["room_name"]; ?>
						
						<li><a href="roomdevices.php?roomname=<?php echo $rm; ?>&id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-bed"><?php echo $rm;  ?></i></a></li>
						<?php } ?>
						
					</ul>
					<li><a href="analytics.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chart-pie"></i>Analytic</a></li>
					<li><a href="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-cog"></i>Settings</a></li>
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
					<h1>Settings &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-cogs"></i></h1>
				</div>
				<div class="subtitle">
					<!-- <h2></h2> -->
					<br>
					<br>
					<i> Be carefull, all changes are irreversible.</i>
					<br>
				</div>
				<div class="content">	
				<br>
				<br>
				<br>
				<br>
				<br>
				<table>
					<tr>
						<td><input type="button" class="modifyaroom" value="Modify a room" onClick="window.location.href = 'selectmodifyroom.php?id=<?php echo $id ?>'" /></td>
						<td><input type="button" class="modifyanaccount" value="Modify an account" onClick="window.location.href = 'selectuseraccount.php?id=<?php echo $id; ?>'" /></td>
					</tr>
					<tr>
						<td><input type="button" class="createaroom" value="Create a room" onClick="window.location.href = 'createroom.php?id=<?php echo $id; ?>'" /></td>
						<td><input type="button" class="createanaccount" value="Create an account" onClick="window.location.href = 'newuser.php?id=<?php echo $id; ?>'" /></td>
					</tr>					
				</table>
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
