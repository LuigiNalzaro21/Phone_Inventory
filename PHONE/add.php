<?php
include("../PHONE/dbphone.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    $stmt = $conn->prepare("INSERT INTO add_phone (model, brand, price, stock, category) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $model, $brand, $price, $stock, $category);    

    try {
        if ($stmt->execute()) {
            header("Location: add-phone.php?success=true");
            exit();
        } else {
            echo "Error: Unable to add phone. Please try again later.";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
    $conn->close();
}
?>
