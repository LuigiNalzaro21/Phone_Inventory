<?php
include("dbemployee.php");

if(isset($_POST['submit'])){
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $phoneNum = mysqli_real_escape_string($conn, $_POST['phoneNum']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);

    $stmt = $conn->prepare("INSERT INTO add_employee (firstName, lastName, position, phoneNum, address, department) VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssss", $firstName, $lastName, $position, $phoneNum, $address, $department);    

    try {
        if ($stmt->execute()) {
            header("Location: add-employee.php?success=true");
        } else {
            echo "Error: Unable to add employee. Please try again later.";
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            header("Location: add-employee.php?error=duplicate");
        } else {
            echo "Error: " . $e->getMessage();
        }
    }

    $stmt->close();
}
$conn->close();
?>