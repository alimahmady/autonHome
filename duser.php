<?php 



$id = $_GET["id"];
$uid= $_GET["uid"];


$con = mysqli_connect("localhost","root","","auton_home");

$sql = "delete from users where id='$uid'";
$sqla = "delete from profile where user_id='$uid'";

$sql2 = mysqli_query($con,$sql);
$sql3 = mysqli_query($con,$sqla);
if ($sql2&&$sql3) {


	header("location:selectuseraccount.php?id=$id&delete=done");


}




?>