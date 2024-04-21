<?php
include("dbconnect.php");

if(isset($_POST['submit'])){
    $username_email = $_POST['username_email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM sign_up WHERE email = '$username_email' AND password = '$password'";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count == 1) {
        session_start();
        $_SESSION['username'] = $username_email;
        header("Location: dashboard.php");
        exit();
    } else {
        echo '<script>
        window.location.href = "index.php?error=invalid_credentials";
        alert("Login Failed. Invalid username or password!!!");
        </script>';
    }
}
?>
