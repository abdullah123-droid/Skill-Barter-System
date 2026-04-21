<?php
require_once '../config/database.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit();
}

$request_id = $_POST['request_id'];
$action = $_POST['action'];
$status = $action == 'accept' ? 'accepted' : 'rejected';

$stmt = $pdo->prepare("UPDATE exchange_requests SET status = ? WHERE id = ? AND receiver_id = ?");
$stmt->execute([$status, $request_id, $_SESSION['user_id']]);

// Get requester info for notification
$stmt = $pdo->prepare("SELECT requester_id FROM exchange_requests WHERE id = ?");
$stmt->execute([$request_id]);
$request = $stmt->fetch();

// Create notification
$stmt = $pdo->prepare("INSERT INTO notifications (user_id, title, message) VALUES (?, ?, ?)");
$message = $status == 'accepted' ? "Your exchange request has been accepted!" : "Your exchange request has been rejected.";
$stmt->execute([$request['requester_id'], "Request $status", $message]);

echo json_encode(['success' => true]);
?>