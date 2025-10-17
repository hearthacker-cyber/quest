<?php

$servername = "srv1837.hstgr.io";
$username = "u329947844_quest";
$password = "Ariharan@2025";
$dbname = "u329947844_quest";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    // Test connection
    $conn->query("SELECT 1");
    
} catch(PDOException $e) {
    // Log error to file
    error_log("Connection failed: " . $e->getMessage());
    
    // Display user-friendly message
    die("Database connection failed. Please try again later.");
}

?>