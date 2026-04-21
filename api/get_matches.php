<?php
require_once '../config/database.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit();
}

$query = "
    SELECT DISTINCT u.id, u.name, u.email, u.department,
           GROUP_CONCAT(DISTINCT CASE WHEN us.skill_type = 'teach' THEN s.skill_name END) as can_teach,
           GROUP_CONCAT(DISTINCT CASE WHEN us.skill_type = 'learn' THEN s.skill_name END) as wants_to_learn
    FROM users u
    JOIN user_skills us ON u.id = us.user_id
    JOIN skills s ON us.skill_id = s.id
    WHERE u.id != ? 
    AND EXISTS (
        SELECT 1 FROM user_skills us2 
        WHERE us2.user_id = u.id 
        AND us2.skill_type = 'teach'
        AND us2.skill_id IN (SELECT skill_id FROM user_skills WHERE user_id = ? AND skill_type = 'learn')
    )
    AND EXISTS (
        SELECT 1 FROM user_skills us2 
        WHERE us2.user_id = u.id 
        AND us2.skill_type = 'learn'
        AND us2.skill_id IN (SELECT skill_id FROM user_skills WHERE user_id = ? AND skill_type = 'teach')
    )
    GROUP BY u.id
    LIMIT 10
";
$stmt = $pdo->prepare($query);
$stmt->execute([$_SESSION['user_id'], $_SESSION['user_id'], $_SESSION['user_id']]);
$matches = $stmt->fetchAll();

echo json_encode(['success' => true, 'matches' => $matches]);
?>