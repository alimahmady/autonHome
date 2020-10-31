<?php


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config.php';

if(isset($_POST["EmailAddress"])){
	$to_email = $_POST["EmailAddress"];
	$code = uniqid(true);
	$query = mysqli_query($con,"INSERT INTO resetpassword (code,email) VALUES ('$code','$to_email')");
	if($query==false){
		exit("Error");
	}



// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings

    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailo.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'alimjan@mailo.com';                     // SMTP username
    $mail->Password   = 'Alimjan123';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('alimjan@mailo.com', 'Alim');
    $mail->addAddress($to_email);     // Add a recipient
                  // Name is optional
    $mail->addReplyTo('no-replay@gmail.com', 'no-replay');
 
$url = "http://" . $_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"])."/resetpassword.php?code=$code";


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'AutonHome, Password reset link !';
    $mail->Body    = "<h1>you requested a password reset</h1>
    click <a href= '$url'>this link </a> to reset  ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'A reset password link has been sent to your email, Please check your email ! ';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit();

}

?>

<html>
<head>
	<head>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
        <meta charset="UTF-8">
        <title>AUTON'HOME</title>
        <link href="base.css" rel="stylesheet" type="text/css" />
		<link href='https://fonts.googleapis.com/css?family=Bree Serif' rel='stylesheet'>
		<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    </head>
</head>

<body>
	<div id='logo'>
		<img src="logo.png" width="400" height="420">
	</div>
	<div class='other_login'>	  
		<ul>
			<li><a href="signin.php">Sign in</a></li>&nbsp;
			<li><a href="signup.php">Sign up</a></li>
		</ul>
	</div>
	<div class='forgot_pwd'>
	<!--p>Create an account:</p-->
		<form action="" method="POST">
			<label for="EmailAddress"><p align="left">Email address:</p></label>
			<input id="EmailAddress"  name="EmailAddress" type="email" minlength="3" maxlength="40" required>
			<br>
			<br>
			<input id="reset" type="submit" value="Send & reset">
		</form>
	</div>
</body>
</html>