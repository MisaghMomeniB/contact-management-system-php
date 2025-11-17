<?php
$host = "localhost";
$dbname = "contact_management"; // Database Name
$username = "root";
$password = "Root@12345!"; // Database Password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
