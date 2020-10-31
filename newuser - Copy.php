<?php

$id = $_GET["id"];

$conn = new mysqli("localhost", "root", "", "auton_home");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$room = "SELECT * FROM room WHERE user_id=".$id."";

$room_result = mysqli_query($conn,$room);
$sqlp = "SELECT * FROM profile where user_id='".$id."'";

$resultp = mysqli_query($conn, $sqlp);

// Associative array
$rowp = mysqli_fetch_assoc($resultp);




if (isset($_POST["Age"])) {
	$Firstname = $_POST["Firstname"];
	$LastName = $_POST["LastName"];
	$Age = $_POST["Age"];
	$EmailAddress = $_POST["EmailAddress"];
	$City = $_POST["City"];
	$Address = $_POST["Address"];
	$ZipCode = $_POST["ZipCode"];
	$NewPwd	= $_POST["NewPwd"];
	$UserType =$_POST["status"];
$conn = new mysqli("localhost", "root", "", "auton_home");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO profile (user_id,name,lastname,Age,email,city,zipcode,Address)
VALUES (null,'$Firstname','$LastName','$Age','$EmailAddress','$City','$ZipCode','$Address')";
$sql2 = "INSERT INTO users (id,type,email,password,user_type) VALUES (null,null,'$EmailAddress','$NewPwd','$UserType')";





if ($conn->query($sql) && $conn->query($sql2)) {
    header("location:newuser.php?done=true&id=$id");
} else {
    echo "Please Complete the Form!";
}

$conn->close();

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
    <body>
        <div class="leftcolumn">
            <div class="companyname">
                <p>Auton'Home</p>
            </div>
            <div class="navigationbar">
                <ul class="mainmenu">
					<img src="<?php echo $rowp["image"]; ?>"  class="center">
					<li class="active"><a href="youraccount.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user"></i>My Account</a></li>
					<li><a href="home.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-home"></i>House</a></li>
					<ul>
						<li><a href="livingroom.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-couch"></i>Livingroom</a></li>
						<?php while ($room_name = mysqli_fetch_assoc($room_result)){

							$rm = $room_name["room_name"]; ?>
						
						<li><a href="roomdevices.php?roomname=<?php echo $rm; ?>&id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-bed"><?php echo $rm;  ?></i></a></li>
						<?php } ?>
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
					<p class="language"><a href="#">EN/FR</a></p> 
					<p class="signout"><a href="confirmationlogout.php?id=<?php echo $id; ?>">sign out</a><i class="fas fa-sign-out-alt"></i></p> 
				</ul>
            </div>
			<div class="main">
				<div class="title">
					<h1>New User <?php if (isset($_GET["done"])) { echo "Has Been Created !"; } ?></h1>
				</div>
				<div class="subtitle">
					<h2>Create a new user</h2>
					<br>
				</div>
				<div class="content">
					<br>
					<form class="form" method="POST">
					<div class="leftcontent">
						<table>
							<tr>
								<td><label for="FirstName" ><p align="left" >First name:<p></label></td>
								<td><input id="FirstName" name="Firstname" type="text" minlength="3" maxlength="15" required></td>
							</tr>
							<tr>
								<td><label for="LastName"><p align="left" >Last name:</p></label></td>
								<td><input id="LastName" name="LastName" type="text" minlength="3" maxlength="15" required></td>
							</tr>							
							<tr>
								<td><label for="Age"><p align="left" >Age:</p></label></td>
								<td><input id="Age" name="Age" type="int" minlength="1" maxlength="3" required></td>
							</tr>							
							<tr>
								<td><label for="EmailAddress"><p align="left">Email address:</p></label></td>
								<td><input id="EmailAddress"  name="EmailAddress" type="email" minlength="3" maxlength="40" required></td>
							</tr>	
							<tr>
								<td><label for="ZipCode"><p align="left" >Zip code:</p></label></td>
								<td><input id="ZipCode" name="ZipCode" type="int"></td>
							</tr>	
						</table>
					</div>
					<div class="rightcontent">
						<table>
							<tr>
								<td><label for="City"><p align="left" >City:</p></label></td>
								<td><input id="City" name="City" type="text" minlength="3" maxlength="30" required></td>
							</tr>
							<tr>
								<td><label for="Address"><p align="left" >Postal address:</p></label></td>
								<td><input id="Address" name="Address" type="text" minlength="3" maxlength="50" required></td>
							</tr>							
							
							<tr>
								<td><label for="Password"><p align="left" >Password:</p></label></td>
								<td><input id="Password" name="NewPwd" type="int"></td>
							</tr>
							<tr>
								<td><label for="Confirm Password"><p align="left" >Confirm Password:</p></label></td>
								<td><input id="ZipCode" name="confirmpassword" type="int"></td>
							</tr>
							<tr>
								<td><p align="left"> Status:</p></td>
								<td>
								<input type="radio" id="Adult" name="status" value="Adult">
								<label for="Adult">Adult</label>
								<input type="radio" id="Children" name="status" value="Children">
								<label for="Children">Children</label>
								<input type="radio" id="Guest" name="status" value="Guest">
								<label for="Guest">Guest</label>
								</td>
							</tr>		
						</table>	
						<br>
						<br>
						<input class="submit" id='newuser'type="submit" value="Submit">				
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



