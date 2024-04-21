<?php
include("dbpurchase.php");

if(isset($_POST['submit'])){
    $productName = mysqli_real_escape_string($conn, $_POST['product-name']);
    $quantity = mysqli_real_escape_string($conn, $_POST['item-quantity']);

    $stmt = $conn->prepare("INSERT INTO add_purchase (productName, quantity) VALUES (?, ?)");
    $stmt->bind_param("ss", $productName, $quantity);    

    try {
        if ($stmt->execute()) {
            header("Location: add-purchase.php?success=true");
        } else {
            echo "Error: Unable to add purchase. Please try again later.";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
}
$conn->close();
?>