<?php 
session_start();
//require_once('connections/connection.php');
if ($_SESSION["login"]!=$_GET["id"]) {
	header("location:plogin");
}
$id = $_GET["id"];

$con = mysqli_connect("localhost","root","","auton_home");
if ($con) {
	
	$sql = "select * from profile";
	$sql1 = mysqli_query($con,$sql);
	



}
else{

	echo "No Connection!";
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
					<img src="icon/macc.png"  class="center">
					<li class="active"><a href="youraccount.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user"></i>My Account</a></li>
					<li><a href="adult_home.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-home"></i>House</a></li>
					<ul>
						<li><a href="adult_livingroom.php?id=<?php echo $id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-couch"></i>Livingroom</a></li>
						
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
					<h1>Modify an account </h1>
				</div>
				<div class="subtitle">
					<h2>Select the account you want to modify</h2>
					<?php if(isset($_GET["delete"])){  ?>
							<h2 style="color: red;">User Has Been Deleted!</h2>
							<?php } ?>
				</div>
				<div class="content">	
				<table>
				<?php while ( $result = mysqli_fetch_assoc($sql1)) { $id2 = $result["user_id"]; ?>
					<tr>
						<td><img src="icon/user.png" width="100" height="100" /><br><br><input type="button" class="modifyaccount" value="<?php echo $result['name']; ?>" onclick="window.location.href = 'modifyuser.php?id=<?php echo $id; ?>&uid=<?php echo $id2; ?> '" /></td>
						<?php if($result=mysqli_fetch_assoc($sql1)){ ?>
						<td><img src="icon/user.png" width="100" height="100" /><br><br><input type="button" class="modifyaccount" value="<?php  echo $result['name'];  ?>" onclick="window.location.href = 'modifyuser.php?id=<?php echo $id; ?>&uid=<?php echo $id2; ?>'" /></td>
						<?php } ?>
					</tr>
					<?php } ?>
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
