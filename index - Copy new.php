
<?php
//require_once('connections/connection.php');


session_start();
if (!isset($_SESSION["login"])) {

	header("location:signin.php?session=no");




}
else{


$id = $_GET["id"];
$login = $_GET["login"];


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
$name = $row["name"];






?>




 

?>

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
					<img src="<?php echo $image; ?>"  class="center">
					<li class="active"><a href="youraccount.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user"></i>My Account</a></li>
					<li><a href="adult_home.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-home"></i>House</a></li>
					<ul>
						<li><a href="livingroom.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-couch"></i>Livingroom</a></li>
						<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-bed"></i>Bedroom</a></li>
					</ul>
					<li><a href="analytics.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-chart-pie"></i>Analytic</a></li>
					
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
					<p class="Signout"><a href="confirmationlogout.php">sign out</a><i class="fas fa-sign-out-alt"></i></p> 
				</ul>
            </div>
            <div class="main">
				<div class="title">
					<h1 align="center">Welcome <?php if (isset($_GET["id"])) echo "Dear ".$name ?></h1>
				</div>
				<div class="subtitle">
					<!-- <h2>Subtitle</h2> -->
				</div>
				<div class="content">
					<table>
						<tr>
							<td class="welcome_image">
								<img src="images/homepage2.jpg" width="585px">
							</td>
							<td class="security">	
								<b> Front door lock </b>
								<br>
								<br>
								<input class="doorlock" type="button" value="On" />
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="doorlock" type="button" value="Off" />
								<br>
								<br>
								<b> Alarm </b>
								<br>
								<br>
								<input class="alarm" type="button" value="On" />
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="alarm" type="button" value="Off" />
								<br>
								<br>
								<br>
								<input type="button" class="callpolice" value="Call the police" onclick="window.location.href = 'https://www.lapolicenationalerecrute.fr/A-votre-service/Nous-contacter'" />	
							</td>
						</tr>
					</table>
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

<?php } ?>
</html>