<?php
echo "<h1>API Test</h1>";
echo "PHP is working!<br>";
echo "Current directory: " . __DIR__ . "<br>";

// Check if api folder exists
if(is_dir('api')) {
    echo "✅ api folder exists<br>";
    
    // Check if login.php exists
    if(file_exists('api/login.php')) {
        echo "✅ api/login.php exists<br>";
    } else {
        echo "❌ api/login.php NOT found<br>";
    }
    
    // Check if register.php exists
    if(file_exists('api/register.php')) {
        echo "✅ api/register.php exists<br>";
    } else {
        echo "❌ api/register.php NOT found<br>";
    }
} else {
    echo "❌ api folder NOT found<br>";
}

// Check config folder
if(is_dir('config')) {
    echo "✅ config folder exists<br>";
    if(file_exists('config/database.php')) {
        echo "✅ config/database.php exists<br>";
    } else {
        echo "❌ config/database.php NOT found<br>";
    }
} else {
    echo "❌ config folder NOT found<br>";
}
?>