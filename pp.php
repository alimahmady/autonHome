<?php 



$id = $_GET["id"];
$uid = $_GET["uid"];

$con = mysqli_connect("localhost","root","","auton_home");
$sql = "select * from users where id='$uid'";
$sql2 = mysqli_query($con,$sql);
$sqlfetch= mysqli_fetch_assoc($sql2);

$uname = "select * from profile where user_id='$uid'";
$uname_q = mysqli_query($con,$uname);
$uname_q1= mysqli_fetch_assoc($uname_q);



if (isset($_POST["newmode"])) {
$umode= $_POST["newmode"];

$newm_sql="update users set user_type='$umode' where id='$uid'";
$newm_qu= mysqli_query($con,$newm_sql);
if($newm_qu){
echo "User Has Been Updated !";
header("location:modifyuser.php?id=$id&uid=$uid");


}
else echo "Not Updated !";



}



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<form method="post">
	<table>
		<tr>
			<td><h1><img src="icon/user.png" width="60" height="60" />  <?php echo $uname_q1["name"]; echo " "; echo $uname_q1["lastname"]; ?>  :</h1></td>
			</tr>
			<tr>


			<td><h2> Current Mode : <?php  if($sqlfetch["user_type"]==null){echo "Administrator"; } else { echo $sqlfetch["user_type"]; } ?> </h2></td>


		</tr>
			<tr>


			<td><h2> New Mode : <select name="newmode">
				<option value="Adult">Adult</option>
				<option value="Guest">Guest</option>
				<option value="Child">Child</option>
			</select> </h2></td>


		</tr>
		 	<tr><td>&nbsp&nbsp&nbsp&nbsp</td><td><input type="submit" value="Change"></input></td></tr>


	</table>

</form>

</body>
</html>