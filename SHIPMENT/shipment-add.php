<?php
include("../SHIPMENT/dbshipment.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
    $supplier_id = mysqli_real_escape_string($conn, $_POST['supplier_id']);
    $model_name = mysqli_real_escape_string($conn, $_POST['model_name']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $email = mysqli_real_escape_string($conn, $_POST['email']); 
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $brand_name = mysqli_real_escape_string($conn, $_POST['brand_name']);

    $stmt = $conn->prepare("INSERT INTO add_shipment (supplier_name, supplier_id, model_name, quantity, email, number, brand_name) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisss", $supplier_name, $supplier_id, $model_name, $quantity, $email, $number, $brand_name);

    try {
        if ($stmt->execute()) {
            header("Location: shipment-add-supplier.php?success=true");
            exit();
        } else {
            echo "Error: Unable to execute the statement.";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
    $conn->close();
}
?>
