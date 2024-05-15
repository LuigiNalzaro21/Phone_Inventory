<?php
session_start();

$admin_username = "admin"; // Fixed admin username
$admin_password = "admin123"; // Fixed admin password

if (isset($_POST['submit'])) {
    $username = $_POST['username_email'];
    $password = $_POST['password'];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: index.php?error=invalid_credentials");
        exit();
    }
}
?>
