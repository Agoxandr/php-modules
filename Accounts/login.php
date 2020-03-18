<?php
$servername = "localhost:3306";
$username = "root";
$password = "";

include("../Utils/debug.php");

try {
    $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    Debug\log("Connected successfully");
} catch (PDOException $e) {
    Debug\log("Connection failed: " . $e->getMessage());
}
