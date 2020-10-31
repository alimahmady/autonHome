<?php
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
$fname = $row["name"];
$lname = $row["lastname"];
$uage = $row["age"];
$umail = $row["email"];
$ucity = $row["city"];
$uaddress = $row["address"];
$uzipcode = $row["zipcode"];
$uhouse_id = $row["house_id"];
$image = $row["image"];






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
					<img src="mec.jpg"  class="center">
					<li class="active"><a href="youraccount.php?id=<?php echo $ID; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user"></i>My Account</a></li>
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
					<p class="language"><a href="#">EN/FR</a></p> 
					<p class="signout"><a href="confirmationlogout.html">sign out</a><i class="fas fa-sign-out-alt"></i></p> 
				</ul>
            </div>
            <div class="main">
				<div class="title">
					<h1>Modify your account</h1>
				</div>
				<!-- <div class="subtitle"> -->
					<!-- <h2>Informations:</h2> -->
				<!-- </div> -->
				<div class="content">
					<br>
					<form class="form" method="POST" action="modifyacc.php?id=<?php echo $ID; ?>" enctype="multipart/form-data">
					<div class="leftcontent">
						<table>
							<tr>
								<td><label for="FirstName" ><p align="left" >First name:<p></label></td>
								<td><input id="FirstName" name="Firstname" type="text" minlength="3" maxlength="100" required value="<?php echo $fname; ?>"></td>
							</tr>
							<tr>
								<td><label for="LastName"><p align="left" >Last name:</p></label></td>
								<td><input id="LastName" name="LastName" type="text" minlength="3" maxlength="15" required value="<?php echo $lname; ?>"></td>
							</tr>							
							<tr>
								<td><label for="Age"><p align="left" >Age:</p></label></td>
								<td><input id="age" name="age" type="text" minlength="1" maxlength="15" required value="<?php echo $uage; ?>"></td>
							</tr>							
							<tr>
								<td><label for="EmailAddress"><p align="left">Email address:</p></label></td>
								<td><input id="EmailAddress"  name="EmailAddress" type="email" minlength="3" maxlength="40" required value="<?php echo $umail; ?>"></td>
							</tr>
							<tr>							
								<td><label for="PhoneNumber"><p align="left">Phone number:</p></label></td>
								<td><input id="PhoneNumber"  name="PhoneNumber" type="tel" pattern="[0-9]{10}"></td>
							</tr>
						</table>
					</div>
					<div class="rightcontent">
						<table>
							<tr>
								<td><label for="City"><p align="left" >City:</p></label></td>
								<td><input id="City" name="City" type="text" minlength="3" maxlength="30" required value="<?php echo $ucity; ?>"></td>
							</tr>
							<tr>
								<td><label for="Address"><p align="left" >Postal address:</p></label></td>
								<td><input id="Address" name="Address" type="text" minlength="3" maxlength="50" required value="<?php echo $uaddress; ?>"></td>
							</tr>							
							<tr>
								<td><label for="ZipCode"><p align="left" >Zip code:</p></label></td>
								<td><input id="ZipCode" name="ZipCode" type="int" value="<?php echo $uzipcode; ?>"></td>
							</tr>							
							<tr>
								<td><label for="IconImage"><p align="left" >Icon image:</p></label>
									<img src="<?php echo $image; ?>" width="100" height="100" align="left">
								</td>
								<td><input type="file" name="fileToUpload" id="fileToUpload"> 				<!-- FIND ANOTHER WAY TO DO -->
								</td>
							</tr>		
						</table>	
						<br>
						<br>
						<input class="submit" id='userinfo' type="submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;					
						<input type="button" class="changepwd" value="Change password" onClick="window.location.href = 'changepwd.html'" />
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