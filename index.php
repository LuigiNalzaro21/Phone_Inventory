<?php
include("login.php");
include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/index.css">
</head>
<body>

    <h1 class=title>PHONE iNVENTORY</h1>
    <div class="login-container">
        <form action="login.php" method="POST" class="login-form">
            <h2>LOG IN</h2>
            <div class="input-group">
                <label for="username_email" class="user">USERNAME OR EMAIL</label>
                <input type="text" id="username_email" name="username_email" required>
            </div>
            <div class="input-group">
                <label for="password" class="user">PASSWORD</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submit" class="login-btn">LOGIN</button>
            <?php
                if(isset($_GET['error']) && $_GET['error'] == 'invalid_credentials') {
                    echo "<p class='error'>Invalid username or password</p>";
                }
            ?>
            <div class="login-with">
                <span>LOGIN WITH</span><br><br><hr class="line">
                <a href="https://www.google.com/" target="blank"><img src="./Images/Logo-google-icon-PNG.png" alt="Google" class="google"></a>
                <a href="https://web.facebook.com/profile.php?id=100069170538898" target="blank"><img src="./Images/pngwing.com.png" alt="Facebook" class="fb"></a>
                <a href="https://www.tiktok.com/en/" target="blank"><img src="./Images/vecteezy_tiktok-png-icon_16716485.png" alt="TikTok" class="tiktok"></a>
            </div>
        </form>
    </div>  

    <div class="signup-prompt">
            <span>HAVEN'T SIGN UP YET?</span><br><br>
            <a href="signup.php" class="signup-btn">SIGN UP</a>
    </div>

    <img src="./Images/be56a06b6b12c6a7fe558a7dbbe28bca.png" alt="Iphone" class="iphone">

</body>
</html>
