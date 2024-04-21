<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("auth.php"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Sales PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/top-sales.css">
</head>
<body>

<nav class="navbar">
    <div class="left">
        <div class="dashboard-icon">
            <i class="fas fa-bars"></i>
        </div>
        <div class="welcome-text">
            <h1>WELCOME, <?php echo isset($firstName) ? $firstName : 'User'; ?></h1>
        </div>
    </div>

    <div class="right">
        <div class="settings-icon">
            <i class="fas fa-wrench"></i> 
        </div>
        <div class="profile-icon">
            <a href="index.php" class="fas fa-user-circle"></a>
        </div>
    </div>
</nav>

    <!-- Navbar 2 -->
    <header>
        <nav>
            <div class="logo">TOP SELLING PHONES</div>
            <ul class="nav-links">
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->
    
    <div class="con">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity Sold</th>
                        <th>Total Sales (PHP)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>iPhone 13</td>
                        <td>150,000</td>
                        <td>PHP 7,500,000,000</td>
                    </tr>
                    <tr>
                        <td>Samsung Galaxy S22</td>
                        <td>120,000</td>
                        <td>PHP 6,000,000,000</td>
                    </tr>
                    <tr>
                        <td>Google Pixel 6</td>
                        <td>110,000</td>
                        <td>PHP 5,500,000,000</td>
                    </tr>
                    <tr>
                        <td>OnePlus 10 Pro</td>
                        <td>100,000</td>
                        <td>PHP 5,000,000,000</td>
                    </tr>
                    <tr>
                        <td>Xiaomi Mi 12</td>
                        <td>100,000</td>
                        <td>PHP 5,000,000,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
