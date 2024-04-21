<?php
include("dbcheckout.php");

if(isset($_POST['submit'])){
    $productName = mysqli_real_escape_string($conn, $_POST['product-name']);
    $quantity = mysqli_real_escape_string($conn, $_POST['item-quantity']);
    $customerName = mysqli_real_escape_string($conn, $_POST['customer-name']); // Added customer name
    $email = mysqli_real_escape_string($conn, $_POST['email']); // Added email
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phone-number']); // Added phone number
    $shippingAddress = mysqli_real_escape_string($conn, $_POST['shipping-address']); // Added shipping address
    $city = mysqli_real_escape_string($conn, $_POST['city']); // Added city
    $country = mysqli_real_escape_string($conn, $_POST['country']); // Added country
    $zipCode = mysqli_real_escape_string($conn, $_POST['zip-code']); // Added zip code

    $stmt = $conn->prepare("INSERT INTO checkout (productName, quantity, customerName, email, phoneNumber, shippingAddress, city, country, zipCode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $productName, $quantity, $customerName, $email, $phoneNumber, $shippingAddress, $city, $country, $zipCode);    

    try {
        if ($stmt->execute()) {
            header("Location: add-purchase.php?success=true");
            exit();
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