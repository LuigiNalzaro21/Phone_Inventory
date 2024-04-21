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
$sql_create_table = "CREATE TABLE IF NOT EXISTS checkout (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    customerName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL,
    shippingAddress TEXT NOT NULL,
    city VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    zipCode VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql_create_table);

?>
