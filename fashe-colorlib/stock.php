<?php
session_start();
$servername ="localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=sneaker_shopdb", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$strSQL = "INSERT INTO product (P_ID,P_NAME,P_PRICE,P_QUANTITY,P_STATUS) VALUES ";
		$strSQL .= "('".$_POST["pid"]."','".$_POST["pname"]."','".$_POST["price"]."','".$_POST["quantity"]."','".$_POST["status"]."')";

    $strSQL1 = "INSERT INTO product_pic (P_ID,PIC_PATH) VALUES ";
    $strSQL1 .= "('".$_POST["pid"]."','".$_POST["pic1"]."')";
    $strSQL2 = "INSERT INTO product_pic (P_ID,PIC_PATH) VALUES ";
    $strSQL2 .= "('".$_POST["pid"]."','".$_POST["pic2"]."')";
    $strSQL3 = "INSERT INTO product_pic (P_ID,PIC_PATH) VALUES ";
    $strSQL3 .= "('".$_POST["pid"]."','".$_POST["pic3"]."')";

  	$conn->exec($strSQL);
    $conn->exec($strSQL1);
    $conn->exec($strSQL2);
    $conn->exec($strSQL3);

	header("location:update_stock.php");
}
catch(PDOException $e)
{
  	echo $strSQL . "<br>" . $e->getMessage();
}

$conn = null;
?>
