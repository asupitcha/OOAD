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

$checkUsername = false;
$checkEmail = false;
$count = 000;

$checkSQL = "SELECT U_ID,U_USERNAME, U_EMAIL FROM user";
$objQuerySQL = $conn->query($checkSQL);
while($row = $objQuerySQL->fetch_assoc()){
	if((int)$row["U_ID"] > $count){
		$count = (int)$row["U_ID"];
	}
	if($_POST["username"] == $row['U_USERNAME']){
		$checkUsername = true;
	}
	if($_POST["email"] == $row['U_EMAIL']){
		$checkEmail = true;
	}

}

++$count;
if(!$checkUsername || !$checkEmail){
	$strSQL = "INSERT INTO user ";
	$strSQL .="(U_ID,U_USERNAME,U_PASSWORD,U_EMAIL,U_FIRSTNAME,U_LASTNAME,U_GENDER,U_DATE,U_PHONE_NUMBER,U_ADDRESS,U_ROLE) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$count."','".$_POST["username"]."','".$_POST["password"]."'";
	$strSQL .=",'".$_POST["email"]."','".$_POST["fname"]."','".$_POST["lname"]."' ";
	$strSQL .=",'".$_POST["gender"]."','".$_POST["date"]."','".$_POST["phone-number"]."','".$_POST["address"]."',0) ";
	$objQuery = $conn->query($strSQL);

	if(!$objQuery)
	{
		//header("location:login.html");
		echo "<script>window.top.window.showResult('Username is not Exist');</script>";
	}
	else
	{
		//echo "<script>alert('Error! Cannot save data');</script>";
		echo "<script>window.top.window.showResult('Welcome!!');</script>";
		echo "<br> Go to <a href='login.html'>Login page</a>";
		header("location:login.html");
	}
}else{
	if($checkUsername){
		echo "<script>window.top.window.showResult('This username has been used!');</script>";
	}
	else{
		echo "<script>window.top.window.showResult('This email has been used!');</script>";
	}
}
?>
