<?php
session_start();
$servername ="localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=sneaker_shopdb", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$strSQL = "INSERT INTO user (U_ID,U_USERNAME,U_EMAIL_U_FIRSTNAME,U_LASTNAME,U_GENDER,U_DATE,U_PHONE_NUMBER,U_ADDRESS,U_ROLE) VALUES ";
		$check = 000;
		$check_lastest_id = $conn->prepare("SELECT U_ID FROM user");
		$check_lastest_id->execute();
		while($row = $check_lastest_id->fetch(PDO::FETCH_ASSOC)){
			if($row > $check){
				$check = (int)$row;
			}
		}
		++$check;
		$strSQL .="('".$check."','".$_POST["username"]."','".$_POST["password"]."' ";
		$strSQL .=",'".$_POST["email"]."','".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["gender"]."' ";
		$strSQL .=",'".$_POST["date"]."','".$_POST["phone-number"]."','".$_POST["address"]."',0) ";
  	$conn->exec($strSQL);
	header("location:login.html");
}
catch(PDOException $e)
{
  	echo $strSQL . "<br>" . $e->getMessage();
}

$conn = null;
?>
