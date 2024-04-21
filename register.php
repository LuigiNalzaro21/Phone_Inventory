<?php
include("dbconnect.php");

if(isset($_POST['submit'])){
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNum = mysqli_real_escape_string($conn, $_POST['phoneNum']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPass'];

    // Perform password validation if necessary

    $stmt = $conn->prepare("INSERT INTO sign_up (firstName, lastName, Email, phoneNum, birthday, password, confirmPass) VALUES (?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssss", $firstname, $lastname, $email, $phoneNum, $birthday, $password, $confirmPass);    

    try {
        if ($stmt->execute()) {
            header("Location: signup.php?success=true");
        } else {
            echo "Error: Unable to register. Please try again later.";
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
