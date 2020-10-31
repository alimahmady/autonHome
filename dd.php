<?php 
session_start();
//require_once('connections/connection.php');
if ($_SESSION["login"]!=$_GET["id"]) {
	header("location:plogin");
}

$id = $_GET["id"];
$room_name = $_GET["roomname"];

$con = mysqli_connect("localhost","root","","auton_home");

$sql = "SELECT * FROM device where room_name='$room_name'";
$result = mysqli_query($con,$sql);


if (isset($_POST["device"])) {

	$d_name = $_POST["device"];
	$delete_q = "DELETE FROM device where device_name='$d_name'";
	$d_q = mysqli_query($con,$delete_q);
	if ($d_q) {

		header("location:roomdevices.php?roomname=$room_name&id=$id");

	}


}













?>


<!DOCTYPE html>
<html>
<head>
	<title>Delete a Device</title>
</head>
<body bgcolor="lightblue">
<div style="border:2px solid black; width: 600px;height: 400px;">
 <form method="post">
  <select name="device">
  <?php while ($fetch = mysqli_fetch_assoc($result)) {
  ?>
    <option value="<?php echo $fetch["device_name"]; ?>"><?php echo $fetch["device_name"]; ?> </option>
    

    <?php } ?>
  </select>
  <input type="submit" value="Delete">
</form> 


</div>
</body>
</html>