<?php
session_start();
unset($_SESSION["login"]);

header("location:signin.php?signout=true");






?>
