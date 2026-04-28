<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "luxestate_db";

// Create connection
$conn = new mysqli($host, $user, $pass);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    $conn->select_db($dbname);
} else {
    die("Error creating database: " . $conn->error);
}

// Create Admins Table
$sql = "CREATE TABLE IF NOT EXISTS admins (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql);

// Create Projects Table
$sql = "CREATE TABLE IF NOT EXISTS projects (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    subtitle VARCHAR(100),
    description TEXT,
    image VARCHAR(255),
    category VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql);

// Create Enquiries Table
$sql = "CREATE TABLE IF NOT EXISTS enquiries (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(200),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql);

// Insert Default Admin if not exists
$checkAdmin = $conn->query("SELECT * FROM admins WHERE username = 'admin'");
if ($checkAdmin->num_rows == 0) {
    $password = password_hash("admin123", PASSWORD_DEFAULT);
    $conn->query("INSERT INTO admins (username, password) VALUES ('admin', '$password')");
}

return $conn;
?>
