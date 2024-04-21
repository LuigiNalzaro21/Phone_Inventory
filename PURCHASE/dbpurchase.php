<?php
$servername = "localhost";
$username = "root";
$password = ""; // Update with your actual password if set
$db_name = "phone"; // Updated database name if necessary
$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Create the table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS add_purchase (
    productName VARCHAR(255) NOT NULL,
    quantity INT NOT NULL
)";
$conn->query($sql_create_table); // Execute the query without displaying output
?>
