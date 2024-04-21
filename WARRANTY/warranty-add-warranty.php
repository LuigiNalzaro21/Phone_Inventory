<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../auth.php"); 

include("../WARRANTY/warranty-add.php");
include("../WARRANTY/dbwarranty.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD WARRANTY PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../WARRANTY/warranty-add-warranty.css">
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
                <a href="../index.php" class="fas fa-user-circle"></a> 
            </div>
        </div>
    </nav>

    <!-- Navbar 2 -->
    <header>
        <nav>
            <div class="logo">WARRANTY</div>
            <ul class="nav-links">
                <li><a href="./warranty-overview.php" class="links">OVERVIEW</a></li>
                <li><a href="#" class="active">ADD WARRANTY</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
        <div class="add-shipment-name">
            <h2>ADD WARRANTY</h2><br>
        </div>
        <form class="shipment-form" method="POST" action="../WARRANTY/warranty-add.php">
            <div class="form-column">
                <label for="customer_name">NAME OF CUSTOMER</label>
                <input type="text" id="customer_name" name="customer_name">
                <label for="customer_id">CUSTOMER'S ID</label>
                <input type="text" id="customer_id" name="customer_id"><br><br><br>
                <label for="model_name">MODEL NAME</label>
                <input type="text" id="model_name" name="model_name">
                <label for="supplier_name">SUPPLIER'S NAME</label>
                <input type="supplier_name" id="supplier_name" name="supplier_name"><br><br><br>
                <label for="phone_num">PHONE NO.</label>
                <input type="text" id="phone_num" name="phone_num">
                <label for="brand_name">BRAND NAME</label>
                <input type="text" id="brand_name" name="brand_name"><br><br><br>
                <label for="start_date">START DATE OF WARRANTY</label>
                <input type="date" id="start_date" name="start_date">
                <label for="end_date">END DATE OF WARRANTY</label>
                <input type="date" id="end_date" name="end_date">
                <button type="submit" name="submit" class="submit">SUBMIT</button>
                <button type="reset" class="reset">RESET</button>
            </div>
        </form>
    </div>

</body>
</html>