<?php
// Database configuration
$database_host = "localhost";
$database_user = "root";
$database_pass = "";
$database_name = "dfbdigital";

// Create connection
$conn = new mysqli($database_host, $database_user, $database_pass, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Optional: Log connection success for debugging (remove in production)
    error_log("Database connected successfully");
}
