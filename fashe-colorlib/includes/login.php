<?php
session_start();
$servername ="localhost";
$username = "root";
$password = "";
$dbname = "sneaker_shopdb";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection failed:" .$conn->connect_error);
}
$sql = "SELECT * FROM login WHERE U_USERNAME = '".POST['username']."' AND U_PASSWORD = '".POST['password']."'";
$objQuerySQL = $conn->query($strSQL);
$objResult = $objQuerySQL->fetch_array();

if(!$objResult){
	echo "username or password incorrect";
}else{
	$_SESSION["U_USERNAME "] = $objResult['username'];
	$_SESSION["U_PASSWORD"] = $objResult['password'];
	session_write_close();
	if($SESSION["U_ROLE"]==0){
		header("location:home-03.html");
	}else{
		header("location:home-02.html");
	}
}


mysql_close();

?>
