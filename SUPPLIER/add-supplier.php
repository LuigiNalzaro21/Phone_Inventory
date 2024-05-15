<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
 

include("../SUPPLIER/add-supp.php");
include("../SUPPLIER/dbsupplier.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD SUPPLIER PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../SUPPLIER/add-supplier.css">
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
            <div class="logo">SUPPLIER</div>
            <ul class="nav-links">
                <li><a href="../SUPPLIER/supplier-overview.php" class="links">OVERVIEW</a></li>
                
                <li><a href="../SUPPLIER/update-supplier.php" class="links">UPDATE SUPPLIER</a></li>
                <li><a href="#" class="active">ADD SUPPLIER</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
        <div class="add-shipment-name">
            <h2>ADD SUPPLIER</h2><br>
        </div>
        <!-- Form to submit supplier data -->
        <form class="shipment-form" method="post" action="add-supp.php"><br><br>
            <label for="first-name">FIRST NAME</label>
            <input type="text" id="first-name" name="first-name" placeholder="Enter first name">
            <label for="last-name">LAST NAME</label>
            <input type="text" id="last-name" name="last-name" placeholder="Enter last name">
            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email" placeholder="Enter email">
            <label for="phone-number">PHONE NUMBER</label>
            <input type="text" id="phone-number" name="phone-number" placeholder="Enter phone number">
            <label for="address">ADDRESS</label>
            <input type="text" id="address" name="address" placeholder="Enter address">
            <!-- Submit and Reset buttons -->
            <div class="form-buttons">
                <button type="submit" name="submit" class="submit">SUBMIT</button>
                <button type="reset" class="reset">RESET</button>
            </div>
        </form>
    </div>

</body>
</html>
