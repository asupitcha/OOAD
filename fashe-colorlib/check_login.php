<?php
require('LoginClass.php');
require('UserClass.php');
session_start();
$servername ="localhost";
$username = "root";
$password = "";
$dbname = "sneaker_shopdb";


$conn = new mysqli($servername,$username,$password,$dbname);
$login = new LoginClass();
$user1 = new UserClass();

if($conn->connect_error){
	die("Connection failed:" .$conn->connect_error);
}
$user = $_POST['username'];
$pwd = $_POST['password'];

if($user == "" OR $pwd == "") {
	echo "<script language=\"JavaScript\"> alert('Username or Password Invalid!') </script>";
	header("location:login.html");
}else {
	$sql = "SELECT * FROM user WHERE U_USERNAME = '".$_REQUEST['username']."' AND U_PASSWORD = '".$_REQUEST['password']."'";
	$objQuerySQL = $conn->query($sql);
	$objResult = $objQuerySQL->fetch_array();

	if(!$objResult){
		echo "<script language=\"JavaScript\"> alert('Username or Password Incorrect!') </script>";
		header("location:login.html");
	}else{
		$_SESSION["U_USERNAME "] = $objResult['U_USERNAME'];
		$_SESSION["U_PASSWORD"] = $objResult['U_PASSWORD'];
		$_SESSION["U_FIRSTNAME"] = $objResult['U_FIRSTNAME'];
		$login->setName($objResult['U_FIRSTNAME']);
		$user1->setUserID($objResult['U_ID']);
		$user1->setFirstName($objResult['U_FIRSTNAME']);
		$user1->setLastName($objResult['U_LASTNAME']);
		$user1->setEmail($objResult['U_EMAIL']);
		$user1->setDate($objResult['U_DATE']);
		$user1->setPhoneNumber($objResult['U_PHONE_NUMBER']);
		$user1->setAddress($objResult['U_ADDRESS']);
		$_SESSION["login"] = $login;
		$_SESSION["user"] = $user1;
		header("location:home-03.php");
	}
}
?>
