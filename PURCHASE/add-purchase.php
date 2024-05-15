<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../PURCHASE/add-pur.php");
include("../PURCHASE/dbpurchase.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PURCHASE/ ADD PURCHASE PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../PURCHASE/add-purchase.css">
</head>
<body>
    
    <nav class="navbar">
        <div class="left">
            <div class="welcome-text">
                <h1>WELCOME, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'User'; ?></h1>
            </div>
        </div>

        <div class="right">
            <div class="profile-icon">
                <a href="../index.php" class="fas fa-user-circle"></a>
            </div>
        </div>
    </nav>

    <!-- Navbar 2 -->
    <header>
        <nav>
            <div class="logo">PURCHASE</div>
            <ul class="nav-links">
                <li><a href="#" class="active">ADD PURCHASE</a></li>
                <li><a href="./checkout.php" class="links">CHECKOUT</a></li>
                <li><a href="./view-purchase.php" class="links">VIEW PURCHASE</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
        <div class="add-shipment-name">
            <h2>ADD PURCHASE</h2><br>
        </div>

        <form class="shipment-form" method="POST" action="../PURCHASE/add-pur.php"><br><br>
            <label for="product-name">PRODUCT NAME</label>
            <input type="text" id="product-name" name="product-name">
            <label for="item-quantity">ITEM QUANTITY</label>
            <div class="quantity-input">
                <input type="number" id="item-quantity" name="item-quantity" value="1" min="1" step="1">
            </div>
            <div class="form-buttons">
                <button type="submit" class="submit" name="submit">SUBMIT</button>
                <button type="reset" class="reset">RESET</button>
            </div>
        </form>

    </div>

</body>
</html>
