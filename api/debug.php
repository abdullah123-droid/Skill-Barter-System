<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Database Debug Test</h1>";

// Test 1: Check if config file exists
echo "<h3>Test 1: Checking config file...</h3>";
if (file_exists('config/database.php')) {
    echo "✅ config/database.php exists<br>";
} else {
    echo "❌ config/database.php NOT found!<br>";
}

// Test 2: Try to connect to database
echo "<h3>Test 2: Testing database connection...</h3>";
require_once 'config/database.php';

// Test 3: Check if users table exists
echo "<h3>Test 3: Checking users table...</h3>";
try {
    $stmt = $pdo->query("SHOW TABLES LIKE 'users'");
    if ($stmt->rowCount() > 0) {
        echo "✅ users table exists<br>";
        
        // Test 4: Count users
        $stmt = $pdo->query("SELECT COUNT(*) as count FROM users");
        $result = $stmt->fetch();
        echo "📊 Total users in database: " . $result['count'] . "<br>";
    } else {
        echo "❌ users table does NOT exist!<br>";
        echo "You need to run the SQL code in phpMyAdmin<br>";
    }
} catch(PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "<br>";
}

echo "<h3>Test Complete!</h3>";
?>