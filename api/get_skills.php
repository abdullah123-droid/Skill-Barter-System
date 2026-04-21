<?php
require_once '../config/database.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit();
}

$stmt = $pdo->prepare("
    SELECT s.id, s.skill_name, s.category, us.skill_type 
    FROM user_skills us 
    JOIN skills s ON us.skill_id = s.id 
    WHERE us.user_id = ?
");
$stmt->execute([$_SESSION['user_id']]);
$skills = $stmt->fetchAll();

echo json_encode(['success' => true, 'skills' => $skills]);
?>