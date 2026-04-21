<?php
require_once '../config/database.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit();
}

$stmt = $pdo->query("SELECT id, skill_name, category FROM skills ORDER BY skill_name");
$skills = $stmt->fetchAll();

echo json_encode(['success' => true, 'skills' => $skills]);
?>