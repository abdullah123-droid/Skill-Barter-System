<?php
require_once '../config/database.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit();
}

$skill_id = $_POST['skill_id'];
$skill_type = $_POST['skill_type'];

try {
    $stmt = $pdo->prepare("INSERT INTO user_skills (user_id, skill_id, skill_type) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $skill_id, $skill_type]);
    echo json_encode(['success' => true]);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Skill already added']);
}
?>