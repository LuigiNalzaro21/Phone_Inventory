<?php
include("dbsupplier.php");

if(isset($_POST['submit'])){
    $lastname = mysqli_real_escape_string($conn, $_POST['last-name']);
    $firstname = mysqli_real_escape_string($conn, $_POST['first-name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNum = mysqli_real_escape_string($conn, $_POST['phone-number']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $stmt = $conn->prepare("INSERT INTO add_supplier (firstName, lastName, Email, phoneNum, address) VALUES (?, ?, ?, ?, ?)");

    $stmt->bind_param("sssss", $firstname, $lastname, $email, $phoneNum, $address);    

    try {
        if ($stmt->execute()) {
            header("Location: add-supplier.php?success=true");
        } else {
            echo "Error: Unable to add supplier. Please try again later.";
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            header("Location: signup.php?error=duplicate");
        } else {
            echo "Error: " . $e->getMessage();
        }
    }

    $stmt->close();
}
$conn->close();
?>
