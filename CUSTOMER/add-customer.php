<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}


include("../CUSTOMER/add-cus.php");
include("../CUSTOMER/dbcustomer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMER/ ADD CUSTOMER PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CUSTOMER/add-customer.css">
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
            <div class="logo">CATEGORY</div>
            <ul class="nav-links">
                <li><a href="#" class="active">ADD CUSTOMER</a></li>
                <li><a href="./edit-customer.php" class="links">EDIT CUSTOMER</a></li>
                <li><a href="./delete-customer.php" class="links">DELETE CUSTOMER</a></li>
                <li><a href="./view-customer.php" class="links">VIEW CUSTOMER</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
        <div class="add-shipment-name">
            <h2>ADD CUSTOMER</h2><br>
        </div>

        <form class="shipment-form" method="POST" action="add-customer.php">
            <label for="first-name">FIRST NAME</label>
            <input type="text" id="first-name" name="first-name">
            <label for="last-name">LAST NAME</label>
            <input type="text" id="last-name" name="last-name">
            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email">
            <label for="phone-number">PHONE NUMBER</label>
            <input type="text" id="phone-number" name="phone-number">
            <label for="purchased-items">PURCHASED ITEMS</label>
            <select id="purchased-items" name="purchased-items">
                <option value="Android">Android Products</option>
                <option value="iOS">iOS Products</option>
            </select>
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