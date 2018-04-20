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

$strFileName = "Product_Pic_Path.csv";
$objFOpen = fopen($strFileName, 'r');
if ($objFOpen){
	while($data = fgetcsv($objFOpen, 1000, ",")){
            echo $data[0]." ";
            echo $data[1]."<br>";
            echo $sql = "INSERT INTO product_pic (P_ID,PIC_PATH)VALUES('$data[0]','$data[1]')";
            echo "<br>";
            $conn->query($sql) or die($conn->error);
        }
        echo 'Finish';
	fclose($objFOpen);
}
?>