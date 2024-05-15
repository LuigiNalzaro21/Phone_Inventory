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
    <title>DASHBOARD PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/dashboard.css">
</head>
<body>

    <nav class="navbar">
        <div class="left">
            <div class="dashboard-icon">
                <i class="fas fa-bars"></i>
            </div>
            <div class="welcome-text">
                <h1>WELCOME, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'User'; ?></h1>
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

    <div class="button-container">
        <button class="top-selling-phone">
            <h2>TOP SELLING PHONES</h2>
            <img src="./Images/be56a06b6b12c6a7fe558a7dbbe28bca.png" alt="iPhone Picture" class="iphone">
            <div class="phone-info">
                <h2>APPLE IPHONE 15</h2>
            </div>
        </button>
        
        <button class="phone-button">
            <a href="./PHONE/add-phone.php">PHONE</a>
        </button>

        <button class="category-button">
            <a href="./CATEGORY/add-category.php">CATEGORY</a>
        </button>

        <button class="customers-button">
            <a href="./CUSTOMER/add-customer.php">CUSTOMERS</a>
        </button>

        <button class="purchase-button">
            <a href="./PURCHASE/add-purchase.php">PURCHASE</a>
        </button>

        <button class="employee-button">
            <a href="./EMPLOYEE/add-employee.php">EMPLOYEE</a>
        </button>

        <button class="shipment-button">
            <a href="./SHIPMENT/shipment-add-supplier.php">SHIPMENT</a>
        </button>

        <button class="supplier-button">
            <a href="./SUPPLIER/add-supplier.php">SUPPLIER</a>
        </button>

        <button class="warranty-button">
            <a href="./WARRANTY/warranty-add-warranty.php">WARRANTY</a>
        </button>

        <button class="review-button">
            <a href="./REVIEWS/add-reviews.php">REVIEW</a>
        </button>
    </div>
    
</body>
</html>
