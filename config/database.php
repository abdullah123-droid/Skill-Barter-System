<?php
// InfinityFree Database Configuration
$host = 'sql100.infinityfree.com';
$dbname = 'if0_41672521_Database';
$username = 'if0_41672521';
$password = 'Usamazahid123';  // Put your InfinityFree login password here

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>