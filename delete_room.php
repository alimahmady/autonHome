<?php


session_start();
//require_once('connections/connection.php');
if ($_SESSION["login"]!=$_GET["id"]) {
	header("location:plogin");
}


$id = $_GET["id"];
$roomname = $_GET["roomname"];



$con = mysqli_connect("localhost","root","","auton_home");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}



$sql = "DELETE FROM room WHERE room_name='$roomname'";
$sql2 ="DELETE FROM device WHERE room_name='$roomname'";



$result = mysqli_query($con, $sql);
$result2 = mysqli_query($con, $sql2);


if ($result&&$result2) {

	header("location:selectmodifyroom.php?id=".$id."&roomname=".$roomname."&delete=done");

}else{
	header("location:dsfsdf.php");


}






?>