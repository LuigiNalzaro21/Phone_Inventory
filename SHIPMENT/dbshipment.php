<?php
$servername = "localhost";
$username = "root";
$password = ""; // Update with your actual password if set
$db_name = "phone"; // Updated database name if necessary
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Create the database if it doesn't exist
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $db_name";
$conn->query($sql_create_db); // Execute the query without displaying output

// Select the database
$conn->select_db($db_name);

// Create the table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS add_shipment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_name VARCHAR(255) NOT NULL,
    supplier_id VARCHAR(255) NOT NULL,
    model_name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    email VARCHAR(255) NOT NULL,
    number VARCHAR(255) NOT NULL,
    brand_name VARCHAR(255) NOT NULL
)";
$conn->query($sql_create_table); // Execute the query without displaying output
?>
