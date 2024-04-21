<?php
include("../WARRANTY/dbwarranty.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $customer_id = mysqli_real_escape_string($conn, $_POST['customer_id']);
    $model_name = mysqli_real_escape_string($conn, $_POST['model_name']);
    $supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['phone_num']); 
    $brand_name = mysqli_real_escape_string($conn, $_POST['brand_name']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);

    $stmt = $conn->prepare("INSERT INTO add_warranty (customer_name, customer_id, model_name, supplier_name, phone_num, brand_name, start_date, end_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $customer_name, $customer_id, $model_name, $supplier_name, $phone_num, $brand_name, $start_date, $end_date);

    try {
        if ($stmt->execute()) {
            header("Location: warranty-add-warranty.php?success=true");
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
