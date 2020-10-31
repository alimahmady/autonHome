<?php 


session_start();
//require_once('connections/connection.php');
if ($_SESSION["login"]!=$_GET["id"]) {
	header("location:plogin");
}

$ID = $_GET["id"];

$con = mysqli_connect("localhost","root","","auton_home");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}





$sql = "SELECT * FROM profile where user_id='".$ID."'";

$result = mysqli_query($con, $sql);

// Associative array
$row = mysqli_fetch_assoc($result);

$image = $row["image"];
$room = "SELECT * FROM room WHERE user_id=".$ID."";

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
                <p><a href="Adult_home.html" style='color:#0b4d85'>Autom'Home</a></p>
            </div>
            <div class="navigationbar">
                <ul class="mainmenu">
					<img src="<?php echo $image; ?>"  class="center">
					<?php if($_SESSION["user_type"]==null ||$_SESSION["user_type"]=='Adult' ||$_SESSION["user_type"]=='Guest' ){ ?>
					<li class="active"><a href="youraccount.php?id=<?php echo $ID; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user"></i>My Account</a></li>
					<?php } ?>
					<li><a href="Adult_home.php?id=<?php echo $ID; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-home"></i>House</a></li>
					<ul>
						<li><a href="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-couch"></i>Livingroom</a></li>
						<?php while ($room_name = mysqli_fetch_assoc($room_result)){

							$rm = $room_name["room_name"]; ?>
						
						<li><a href="roomdevices.php?roomname=<?php echo $rm; ?>&id=<?php echo $ID; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-bed"><?php echo $rm;  ?></i></a></li>
						<?php } ?>
						
					</ul>
					<?php if($_SESSION["user_type"]==null ||$_SESSION["user_type"]=='Adult'){ ?>
					<li><a href="analytics.php?id=<?php echo $ID; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chart-pie"></i>Analytic</a></li>
					<?php } ?>
					<?php if($_SESSION["user_type"]==null){ ?>
					<li><a href="settings.php?id=<?php echo $ID ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-cog"></i>Settings</a></li>
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
					<p class="signout"><a href="confirmationlogout.php?id=<?php echo $ID; ?>">sign out</a><i class="fas fa-sign-out-alt"></i></p> 
				</ul>
            </div>
            <div class="main">
				<div class="title">
					<h1>My Living Room</h1>
				</div>
				<div class="subtitle">
					<h2>Home Components Controllers</h2>
					<br>
				</div>
				<table >
					<th>
						<div class="wg">
							<table class="tb">
								<tr>
									<th colspan="2">Temperature</th>
								</tr>
								<tr>
									<td rowspan="2"><img src="temp.png" class="cl"></td>
									<td><a class="clcl"><img src="up.png"></a></td>
								</tr>
								<tr>
									<td><a class="clcl"><img src="down.png"></a></td>
								</tr>
							</table>
						</div>
						<div class="wg">
							<table class="tb">
								<tr>
									<th colspan="2">Brightness</th>
								</tr>
								<tr>
									<td rowspan="2"><img class="icon_device" src="br.png"></td>
									<td><a class="clcl"><img class="icon_state" src="up.png"></a></td>
								</tr>
								<tr>
									<td><a class="clcl"><img class="icon_state" src="down.png"></a></td>
								</tr>
							</table>
						</div>
						<div class="wg">
							<table class="tb">
								<tr>
									<th colspan="2">Shutters</th>
								</tr>
								<tr>
									<td rowspan="2"><img src="shutter.png"></td>
									<td><a class="clcl"><img src="up.png"></a></td>
								</tr>
								<tr>
									<td><a class="clcl"><img src="down.png"></a></td>
								</tr>
							</table>
						</div>
						<div class="wg">
							<table class="tb">
								<tr>
									<th colspan="2">Volume</th>
								</tr>
								<tr>
									<td rowspan="2"><img src="specker.png"></td>
									<td><a class="clcl"><img src="up.png"></a></td>
								</tr>
								<tr>
									<td><a class="clcl"><img src="down.png"></a></td>
								</tr>
							</table>
						</div>
					</th>
            </div>
            <div class="footer">
				<p><a href="companyinfo.php?id=<?php echo $ID; ?>" style='color:#0b4d85'>Company information</a></p>
				<p><a href="generalcondition.php?id=<?php echo $ID; ?>" style='color:#0b4d85'>General conditions</a></p>
				<p><a href="customeragreement.php?id=<?php echo $ID; ?>" style='color:#0b4d85'>Customer Agreement</a></p>
				<p><a href="contactus.php?id=<?php echo $ID; ?>" style='color:#0b4d85'>Contact us</a></p>
            </div>
        </div>
        <script src="script/iemobile-fix.js" type="text/javascript"></script>
    </body>
</html>