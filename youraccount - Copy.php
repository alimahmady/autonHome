

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
					<img src="images/mec.jpg"  class="center">
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
					<p class="signout"><a href="confirmationlogout.php?id=<?php echo $_GET["id"]; ?>">sign out</a><i class="fas fa-sign-out-alt"></i></p> 
				</ul>
            </div>
            <div class="main">
				<div class="title">
					 <h1>Your account</h1>
					 <img src="images/mec.jpg" width=100 height=100>
				</div>
				<!-- <div class="subtitle"> -->
					<!-- <h2>Informations:</h2> -->
				<!-- </div> -->
				<div class="content">
					<div class="leftcontent">
						<table>
							<tr>
								<td><p align="left" >First name:</p></td>
								<td><p align="left" ><i>HERE</p></i><td>
							</tr>
							<tr>
								<td><p align="left">Last name:</p></td>
								<td><p align="left"><i>HERE</p></i><td>
							</tr>							
							<tr>
								<td><p align="left">Age:</p></td>
								<td><p align="left"><i>HERE</p></i><td>
							</tr>
							<tr>														
								<td><p align="left">Email address:</p></td>
								<td><p align="left"><i>HERE</p></i><td>
							</tr>		
						</table>
					</div>
					<div class="rightcontent">
						<table >
							<tr>
								<td><p align="left">Phone number:</p></td>
								<td><p align="left"><i>HERE</p></i><td>
							</tr>
							<tr>
								<td><p align="left">City:</p></td>
								<td><p align="left"><i>HERE</p></i><td>
							</tr>							
							<tr>
								<td><p align="left">Postal address:</p></td>
								<td><p align="left"><i>HERE</p></i><td>
							</tr>							
							<tr>							
								<td><p align="left">Zip code:</p></td>
								<td><p align="left"><i>HERE</p></i><td>
							</tr>		
						</table>					
						<input type="button" class="changeinformation" value="Change information" onclick="window.location.href = 'modifyyouraccount.php'" />
						<br>
						<br>
					</div>
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