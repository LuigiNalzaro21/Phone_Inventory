<?php
include("register.php");
include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP PAGE</title>
    <link rel="stylesheet" href="./CSS/signup.css">
</head>
<body>

    <h1 class="title">PHONE iNVENTORY</h1>

    <div class="signup-container">
        <form action="register.php" method="POST" class="signup-form" onsubmit="return validateForm();">
            <h2>SIGN UP</h2>
            <div class="input-group">
                <label for="firstname" class="user">FIRST NAME</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <div class="input-group">
                <label for="lastname" class="user">LAST NAME</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="input-group">
                <label for="email" class="user">EMAIL</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="phoneNum" class="user">PHONE NUMBER</label>
                <input type="text" id="phoneNum" name="phoneNum" required>
            </div>
            <div class="input-group">
                <label for="birthday" class="user">BIRTHDAY</label>
                <input type="date" id="birthday" name="birthday" required>
            </div>
            <div class="input-group">
                <label for="password" class="user">PASSWORD</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirmPass" class="user">CONFIRM PASSWORD</label>
                <input type="password" id="confirmPass" name="confirmPass" required>
            </div>
            <button type="submit" name="submit" class="signup-btn">SIGN UP</button>
            <div id="passwordMismatch" class="notification"></div>
        </form>
    </div>

    <div class="login-prompt">
        <span>ALREADY HAVE AN ACCOUNT?</span><br><br>
        <a href="index.php" class="login-btn">LOGIN</a>
    </div>

    <img src="./Images/be56a06b6b12c6a7fe558a7dbbe28bca.png" alt="Iphone" class="iphone">

    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPass").value;
            if (password != confirmPassword) {
                document.getElementById("passwordMismatch").innerHTML = "Passwords do not match";
                return false;
            }
            return true;
        }
    </script>

</body>
</html>
        