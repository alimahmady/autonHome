

<?php



session_start();
//require_once('connections/connection.php');
if ($_SESSION["login"]!=$_GET["id"]) {
	header("location:plogin");
}




$id = $_GET["id"];

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









if (isset($_POST["age"])) {
	$Firstname = $_POST["Firstname"];
	$LastName = $_POST["LastName"];
	$Age = $_POST["age"];
	$EmailAddress = $_POST["EmailAddress"];
	$City = $_POST["City"];
	$Address = $_POST["Address"];
	$ZipCode = $_POST["ZipCode"];
	if ($_FILES["image"]["name"]!="") {
		$path ="images/".time().$_FILES["image"]["name"];
		move_uploaded_file($_FILES["image"]["tmp_name"], $path);
	}else{
		$path = $image;
	}
	

$conn = new mysqli("localhost", "root", "", "auton_home");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "update  profile set name='$Firstname', lastname='$LastName',age='$Age',email='$EmailAddress',city='$City',zipcode='$ZipCode',address='$Address',image='$path' where user_id=".$id;





if ($conn->query($sql)) {
    header("location:youraccount.php?id=".$id."&modify=done");
   


} else {
    echo "Please Complete the Form!";
}

$conn->close();

}
else{


	echo "error";
}



?>
