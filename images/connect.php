<?php
$servername = "localhost";
$username = "root";  // Default XAMPP username
$password = "";      // Default XAMPP password
$dbname = "signup";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Set charset to utf8mb4
$conn->set_charset("utf8mb4");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);
?> 