<?php

$host = "localhost";
$user = "root";
$pass = "Root@12345!";
$dbname = "contact_management";

try {
    $pdo = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}