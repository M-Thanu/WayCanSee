<?php
$conn = new mysqli("localhost", "root", "DBsql175", "");

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
echo "✅ Connected successfully to MySQL.";
?>
