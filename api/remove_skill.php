<?php
require_once '../config/database.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit();
}

$skill_id = $_POST['skill_id'];
$skill_type = $_POST['skill_type'];

$stmt = $pdo->prepare("DELETE FROM user_skills WHERE user_id = ? AND skill_id = ? AND skill_type = ?");
$stmt->execute([$_SESSION['user_id'], $skill_id, $skill_type]);

echo json_encode(['success' => true]);
?>