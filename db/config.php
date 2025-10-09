<?php

$servername = "srv1837.hstgr.io";
$username = "u329947844_quest";
$password = "8x~chEiT*";
$dbname = "u329947844_quest";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully with PDO";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>