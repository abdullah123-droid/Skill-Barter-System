<?php
require_once '../config/database.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit();
}

$receiver_id = $_POST['receiver_id'];
$skill_offered = $_POST['skill_offered'];
$skill_requested = $_POST['skill_requested'];
$message = isset($_POST['message']) ? $_POST['message'] : '';

$stmt = $pdo->prepare("
    INSERT INTO exchange_requests (requester_id, receiver_id, skill_offered, skill_requested, message) 
    VALUES (?, ?, ?, ?, ?)
");
$stmt->execute([$_SESSION['user_id'], $receiver_id, $skill_offered, $skill_requested, $message]);

// Create notification
$stmt = $pdo->prepare("
    INSERT INTO notifications (user_id, title, message) 
    VALUES (?, ?, ?)
");
$stmt->execute([$receiver_id, 'New Exchange Request', "You received a skill exchange request from " . $_SESSION['user_name']]);

echo json_encode(['success' => true]);
?>