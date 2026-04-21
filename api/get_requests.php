<?php
require_once '../config/database.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit();
}

// Get received requests
$stmt = $pdo->prepare("
    SELECT er.*, u.name as sender_name 
    FROM exchange_requests er
    JOIN users u ON er.requester_id = u.id
    WHERE er.receiver_id = ?
    ORDER BY er.created_at DESC
");
$stmt->execute([$_SESSION['user_id']]);
$received = $stmt->fetchAll();

// Get sent requests
$stmt = $pdo->prepare("
    SELECT er.*, u.name as receiver_name 
    FROM exchange_requests er
    JOIN users u ON er.receiver_id = u.id
    WHERE er.requester_id = ?
    ORDER BY er.created_at DESC
");
$stmt->execute([$_SESSION['user_id']]);
$sent = $stmt->fetchAll();

echo json_encode(['success' => true, 'received' => $received, 'sent' => $sent]);
?>