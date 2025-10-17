<?php
require_once 'db/config.php';

echo "<h2>Database Connection Test</h2>";

try {
    // Test basic connection
    echo "✓ Database connection successful<br>";
    
    // Test if users table exists
    $stmt = $conn->query("SHOW TABLES LIKE 'users'");
    if ($stmt->rowCount() > 0) {
        echo "✓ Users table exists<br>";
        
        // Test table structure
        $stmt = $conn->query("DESCRIBE users");
        echo "✓ Table structure:<br>";
        while ($row = $stmt->fetch()) {
            echo "&nbsp;&nbsp;- {$row['Field']} ({$row['Type']})<br>";
        }
        
        // Test insert
        $testEmail = "test_" . time() . "@test.com";
        $testStmt = $conn->prepare("INSERT INTO users (name, email, password, role, grade) VALUES (?, ?, ?, ?, ?)");
        $result = $testStmt->execute(["Test User", $testEmail, password_hash("test123", PASSWORD_DEFAULT), "student", 5]);
        
        if ($result) {
            echo "✓ Test insert successful (ID: " . $conn->lastInsertId() . ")<br>";
            
            // Clean up test data
            $conn->prepare("DELETE FROM users WHERE email = ?")->execute([$testEmail]);
            echo "✓ Test data cleaned up<br>";
        } else {
            echo "✗ Test insert failed<br>";
        }
        
    } else {
        echo "✗ Users table does not exist<br>";
    }
    
} catch (PDOException $e) {
    echo "✗ Error: " . $e->getMessage() . "<br>";
}
?>