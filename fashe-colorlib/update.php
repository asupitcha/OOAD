<?php
session_start();
$servername ="localhost";
$username = "root";
$password = "";
$dbname = "sneaker_shopdb";
ini_set('max_execution_time', 300);

$conn = new mysqli($servername,$username,$password,$dbname);
mysqli_set_charset($conn, 'utf8');
if($conn->connect_error){
	die("Connection failed:".$conn->connect_error);
}

$strFileName = "Product.csv";
$objFOpen = fopen($strFileName, 'r');
if ($objFOpen){
	while($data = fgetcsv($objFOpen, 1000, ",")){
		//$file = fgets($objFOpen, 4096);
                //$temp = explode(',',$file);
                echo $data[0]." ";
                echo $data[1]." ";
                echo $data[2]." ";
                echo $data[3]." ";
                echo $data[4]."<br>";
                $price = (int)$data[2];
                $amount = (int)$data[3];
                echo $sql = "INSERT INTO product (P_ID,P_NAME,P_PRICE,P_QUANTITY,P_STATUS)VALUES('$data[0]','$data[1]','$price','$amount','$data[4]')";
                echo "<br>";
                $conn->query($sql) or die($conn->error);
        }
        echo 'Finish';
	fclose($objFOpen);
}
?>