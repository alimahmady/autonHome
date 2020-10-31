<?php 



session_start();
//require_once('connections/connection.php');
if ($_SESSION["login"]!=$_GET["id"]) {
	header("location:plogin");
}

$roomname = $_GET["roomname"];
$id = $_GET["id"];



$con = mysqli_connect("localhost","root","","auton_home");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}





$sql = "SELECT * FROM device where room_name='".$roomname."'";
$sql2 = "SELECT * FROM profile where user_id='".$id."'";


$image_sql = mysqli_query($con, $sql2);

// Associative array



$row_image = mysqli_fetch_assoc($image_sql);


$image = $row_image["image"];

$device_name = mysqli_query($con, $sql); 









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
					<h1>Room </h1>
				</div>
				<div class="subtitle">
					<h2>Modify your room devices:</h2>
				</div>
				<div class="content">
				<table class="table_devices">
				<?php while ($device_row=mysqli_fetch_assoc($device_name)) { ?>
					<tr>

						<?php if($device_row) { ?> <td>
						
							<img src="icon/<?php echo $device_row['device_type']; ?>" width=100px height=100px><br>
							<input type="button" class="deletedevice" value="<?php echo $device_row['device_name'];    ?>" onclick="window.location.href = 'roomdevices.html'"/>
							</img>

						</td>
						<?php } ?>
						
						<td>
							<?php if($device_row=mysqli_fetch_assoc($device_name)) { ?> <img src="icon/<?php echo $device_row['device_type']; ?>" width=100px height=100px><br>
							<input type="button" class="deletedevice" value="<?php echo $device_row['device_name'];    ?>" onclick="window.location.href = 'roomdevices.html'"/>
							</img>
							<?php  } ?>
						</td>
						
					</tr>
					<?php } ?>
					
					
				</table>
				<br>			
				<br>			
				<table class="table_changes">
					<tr>
						<td><input type="button" class="addadevice" value="Add a device" onclick="window.location.href = 'adddevice.php?id=<?php echo $id; ?>&roomname=<?php echo $roomname; ?>'"/></td>
						<td><input type="button" class="deleteroom" value="Delete a Device" onclick="window.location.href = 'dd.php?id=<?php echo $id; ?>&roomname=<?php echo $roomname; ?>'"/></td>
						<td><input type="button" class="deleteroom" value="Delete the room" onclick="window.location.href = 'delete_room.php?id=<?php echo $id; ?>&roomname=<?php echo $roomname; ?>'"/></td>
							
					</tr>
				</table>
				<!-- <div class="bottombuttons"> -->
					<!-- <input type="button" class="addadevice" value="Add a device" onClick="window.open'adddevices.html'"/> &nbsp;&nbsp;&nbsp;&nbsp;	 -->
					<!-- <input type="button" class="deleteroom" value="Delete the room" onClick="window.open'modifyroom.html'"/> &nbsp;&nbsp;&nbsp;&nbsp; -->
					<!-- <input type="button" class="savechange" value="Save changes" onClick="window.open'modifyroom.html'"/> -->
				<!-- </div> -->
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