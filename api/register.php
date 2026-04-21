<?php
require_once '../config/database.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, department, semester) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $password, $department, $semester]);
        echo json_encode(['success' => true]);
    } catch(PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Email already exists']);
    }
}
?>