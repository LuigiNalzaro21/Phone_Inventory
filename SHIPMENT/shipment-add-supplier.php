<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}


include("../SHIPMENT/shipment-add.php");
include("../SHIPMENT/dbshipment.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHIPMENT ADD SUPPLIER PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../SHIPMENT/shipment-add-supplier.css">
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
            <div class="logo">SHIPMENT</div>
            <ul class="nav-links">
                <li><a href="./shipment-overview.php" class="links">OVERVIEW</a></li>
                <li><a href="#" class="active">ADD SHIPMENT</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
        <div class="add-shipment-name">
            <h2>ADD SHIPMENT</h2><br>
        </div>
        <form class="shipment-form" method="POST" action="../SHIPMENT/shipment-add.php">
            <div class="form-column">
                <label for="supplier_name">NAME OF SUPPLIER</label>
                <input type="text" id="supplier_name" name="supplier_name">
                <label for="supplier_id">SUPPLIER'S ID</label>
                <input type="text" id="supplier_id" name="supplier_id"><br><br><br>
                <label for="model_name">MODEL NAME</label>
                <input type="text" id="model_name" name="model_name">
                <label for="quantity">QUANTITY</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" step="1"><br><br><br>
                <label for="email">EMAIL</label>
                <input type="text" id="email" name="email">
                <label for="number">NO.</label>
                <input type="text" id="number" name="number">
                <label for="brand_name">BRAND NAME</label>
                <input type="text" id="brand_name" name="brand_name"><br><br><br>
                <button type="submit" name="submit" class="submit">SUBMIT</button>
                <button type="reset" class="reset">RESET</button>
            </div>
        </form>
    </div>

</body>
</html>