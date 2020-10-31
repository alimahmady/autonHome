<?php 

$id = $_GET["id"];





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
					<li class="active"><a href="youraccount.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user"></i>My Account</a></li>
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
					<p class="signout"><a href="confirmationlogout.php?id=<?php echo $id; ?>">sign out</a><i class="fas fa-sign-out-alt"></i></p> 
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
				</table>
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