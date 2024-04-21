<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("dbconnect.php");

// Retrieve user's first name from the database
$username = $_SESSION['username'];
$sql = "SELECT firstName FROM sign_up WHERE email = '$username'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $firstName = $row['firstName'];
} else {
    // Handle the case where the user's first name is not found
    $firstName = "User";
}

mysqli_close($conn);
?>
