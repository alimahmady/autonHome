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
					<?php if($_SESSION["user_type"]==null || $_SESSION["user_type"]=='Adult' ||$_SESSION["user_type"]=='Guest' ){ ?>
					<li class="active"><a href="youraccount.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user"></i>My Account</a></li>
					<?php } ?>
					<li><a href="adult_home.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-home"></i>House</a></li>
					<ul>
						<li><a href="adult_livingroom.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-couch"></i>Livingroom</a></li>
						<?php while ($room_name = mysqli_fetch_assoc($room_result)){

							$rm = $room_name["room_name"]; ?>
						
						<li><a href="roomdevices.php?roomname=<?php echo $rm; ?>&id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-bed"><?php echo $rm;  ?></i></a></li>
						<?php } ?>
					</ul>
					<?php if($_SESSION["user_type"]==null || $_SESSION["user_type"]=='Adult' ){ ?>
					<li><a href="analytics.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chart-pie"></i>Analytic</a></li>
					<?php } ?>
					<?php if($_SESSION["user_type"]==null ){ ?>
					<li><a href="settings.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-cog"></i>Settings</a></li>
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
						<div class="wg" style="width: 300px;height:300px;padding: 10px;">
						<br>
							<img src="icon/<?php echo $device_row['device_type']; ?>" width=60px height=60px style="z-index: 100;"><br><br>
							<input type="button" class="deletedevice" value="<?php echo $device_row['device_name'];    ?>" onclick="window.location.href = 'turn.php'"/><br>
							</img>
							<?php if($device_row['device_type']=='light'){ ?><br>

<label class="switch">
											<input type="checkbox" checked>
											<span class="slider round"></span>
										</label>
										<br>
										<p> Brightness </p>
										<div class="slidecontainer" style="width: 100%; "  >
										<input type="range" min="1" max="100" value="50" class="slider2" id="myRange">
										</div>
</div>


								<?php } ?>
								<?php if($device_row['device_type']=='temperature'){ ?>



							<table class="tb">
								<tr>
								
								</tr>
								<tr>
									
								</tr>
								<tr>
									<td>
										<div class="slidecontainer">
										<input type="range" min="1" max="100" value="50" class="slider2" id="myRange">
										</div>
									</td>
								</tr>
							</table>
						

</div>

								<?php } ?> 

								<?php if($device_row['device_type']=='heater'){ ?>


<td>
										<label class="switch">
											<input type="checkbox" checked>
											<span class="slider round"></span>
										</label>
																				<br>
										<br>
										<p> Heat </p>
										<div class="slidecontainer">
										<input type="range" min="1" max="100" value="50" class="slider2" id="myRange">
										</div>
									</td>
									</div>

								<?php } ?> 
								<?php if($device_row['device_type']=='airconditionner'){ ?>


<td>
										<label class="switch">
											<input type="checkbox" checked>
											<span class="slider round"></span>
										</label>
																				<br>
										<br>
										<p> Fresh air </p>
										<div class="slidecontainer">
										<input type="range" min="1" max="100" value="50" class="slider2" id="myRange">
										</div>
									</td>
</div>

								<?php } ?> 
								<?php if($device_row['device_type']=='shutters'){ ?>


<td>
										<div class="slidecontainer">
										<input type="range" min="1" max="100" value="50" class="slider2" id="myRange">
										</div>
									</td>
</div>
								<?php } ?> 
								<?php if($device_row['device_type']=='speaker'){ ?>


<td>
										<label class="switch">
											<input type="checkbox" checked>
											<span class="slider round"></span>
										</label>
										<br>
										<br>
										<p> Volume </p>
										<div class="slidecontainer">
										<input type="range" min="1" max="100" value="50" class="slider2" id="myRange">
										</div>
									</td>
</div>

								<?php } ?> 
								<?php if($device_row['device_type']=='TV'){ ?>


<tr>
									<td>
										<label class="switch">
											<input type="checkbox" checked>
											<span class="slider round"></span>
										</label>
										<br>
										<p> Volume </p>
										<div class="slidecontainer">
										<input type="range" min="1" max="100" value="50" class="slider2" id="myRange">
										</div>
									</td>
								</tr>
								</div>

								<?php } ?> 




						</td>
						</div>
						<?php } ?>
						
						<td>
							<?php if($device_row=mysqli_fetch_assoc($device_name)) { ?> <img src="icon/<?php echo $device_row['device_type']; ?>" width=100px height=100px><br>
							<input type="button" class="deletedevice" value="<?php echo $device_row['device_name'];    ?>" onclick="window.location.href = 'turn.php'"/>
							</img>
							</div>
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
				<p><a href="companyinfo.php?id=<?php echo $id; ?>">Company information</a></p>
				<p><a href="generalcondition.php?id=<?php echo $id; ?>">General conditions</a></p>
				<p><a href="customeragreement.php?id=<?php echo $id; ?>">Customer Agreement</a></p>
				<p><a href="contactus.php?id=<?php echo $id; ?>">Contact us</a></p>
            </div>
        </div>

        <script src="script/iemobile-fix.js" type="text/javascript"></script>
    </body>
</html>