<?php
$severname = "localhost";
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql: host=$severname;dbaname = sneaker_shopdb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>