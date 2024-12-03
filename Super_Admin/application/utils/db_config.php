<?php

// $host = "sql212.ezyro.com";
// $db = "ezyro_37784199_salon_booking";
// $user = "ezyro_37784199";
// $pass = "1cf9ae7aaa";

$host = "localhost";
$db = "salon_booking";
$user = "root";
$pass = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", "$user", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>