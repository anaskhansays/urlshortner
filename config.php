<?php

//db config

$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "test";

//create db connection

try{
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}


?>