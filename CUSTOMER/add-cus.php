<?php
include("../CUSTOMER/dbcustomer.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $first_name = mysqli_real_escape_string($conn, $_POST['first-name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last-name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone-number']);
    $purchased_items = mysqli_real_escape_string($conn, $_POST['purchased-items']);
    $item_quantity = mysqli_real_escape_string($conn, $_POST['item-quantity']);

    $stmt = $conn->prepare("INSERT INTO add_customer (first_name, last_name, email, phone_number, purchased_items, item_quantity) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $first_name, $last_name, $email, $phone_number, $purchased_items, $item_quantity);

    try {
        if ($stmt->execute()) {
            header("Location: add-customer.php?success=true");
            exit();
        } else {
            echo "Error: Unable to add customer. Please try again later.";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
    $conn->close();
}
?>
