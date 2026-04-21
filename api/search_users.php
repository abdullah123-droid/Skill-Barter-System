<?php
require_once '../config/database.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit();
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$skill_type = isset($_GET['skill_type']) ? $_GET['skill_type'] : '';

$query = "SELECT DISTINCT u.id, u.name, u.email, u.department, u.semester 
          FROM users u 
          JOIN user_skills us ON u.id = us.user_id 
          JOIN skills s ON us.skill_id = s.id 
          WHERE u.id != ?";
$params = [$_SESSION['user_id']];

if ($search) {
    $query .= " AND (s.skill_name LIKE ? OR u.name LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
}
if ($skill_type) {
    $query .= " AND us.skill_type = ?";
    $params[] = $skill_type;
}

$query .= " GROUP BY u.id LIMIT 20";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$users = $stmt->fetchAll();

foreach ($users as &$user) {
    $stmt = $pdo->prepare("
        SELECT s.skill_name, us.skill_type 
        FROM user_skills us 
        JOIN skills s ON us.skill_id = s.id 
        WHERE us.user_id = ?
    ");
    $stmt->execute([$user['id']]);
    $user['skills'] = $stmt->fetchAll();
}

echo json_encode(['success' => true, 'users' => $users]);
?>