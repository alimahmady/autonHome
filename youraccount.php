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


$room = "SELECT * FROM room WHERE user_id=".$id."";

$room_result = mysqli_query($con,$room);












?>





<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
        <meta charset="UTF-8">
        <title>AUTON'HOME</title>
        <link href="styles/base.css" rel="stylesheet" type="text/css" />
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
					<img src="<?php echo $row["image"] ?>"  class="center">
					<?php if ($_SESSION["user_type"]==null || $_SESSION["user_type"]=='Adult' || $_SESSION["user_type"]=="Guest") { ?>
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
					<?php if($_SESSION["user_type"]==null || $_SESSION["user_type"]=='Adult'){ ?>
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
					<p class="signout"><a href="confirmationlogout.php?id=<?php echo $_GET["id"]; ?>">sign out</a><i class="fas fa-sign-out-alt"></i></p> 
				</ul>
            </div>
            <div class="main">
				<div class="title">
					 <h1 style="color: red;"> <?php if(isset($_GET["modify"])) echo "Your account has been modefied "; ?></h1>
					 <img src="<?php echo $row["image"] ?>"  width=100 height=100>
				</div>
				<!-- <div class="subtitle"> -->
					<!-- <h2>Informations:</h2> -->
				<!-- </div> -->
				<div class="content">
					
						<table>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>LastName</th>
							<th>Age</th>
							<th>Email</th>
							<th>City</th>
							<th>Address</th>
							<th>ZipCode</th>
							<th>House ID</th>

							</tr>
							<tr>
								<td><?php echo $row["user_id"]; ?></td>
								<td><?php echo $row["name"]; ?></td>
								<td><?php echo $row["lastname"]; ?></td>
								<td><?php echo $row["age"]; ?></td>
								<td><?php echo $row["email"]; ?></td>
								<td><?php echo $row["city"]; ?></td>
								<td><?php echo $row["address"]; ?></td>
								<td><?php echo $row["zipcode"]; ?></td>
								<td><?php echo $row["house_id"]; ?></td>
								



							</tr>



						</table>








						<input type="button" class="changeinformation" value="Change information" onclick="window.location.href = 'modifyyouraccount.php?id=<?php echo $id; ?>'" />
						<br>
						<br>
					</div>
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