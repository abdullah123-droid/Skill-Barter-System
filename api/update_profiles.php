<?php
require_once '../config/database.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit();
}

$name = $_POST['name'];
$department = $_POST['department'];
$semester = $_POST['semester'];

$stmt = $pdo->prepare("UPDATE users SET name = ?, department = ?, semester = ? WHERE id = ?");
$stmt->execute([$name, $department, $semester, $_SESSION['user_id']]);

$_SESSION['user_name'] = $name;
echo json_encode(['success' => true]);
?>