<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../auth.php");

include("../PURCHASE/check.php");
include("../PURCHASE/dbcheckout.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PURCHASE/ CHECKOUT PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../PURCHASE/checkout.css">
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
            <div class="logo">PURCHASE</div>
            <ul class="nav-links">
                <li><a href="./add-purchase.php" class="links">ADD PURCHASE</a></li>
                <li><a href="#" class="active">CHECKOUT</a></li>
                <li><a href="./view-purchase.php" class="links">VIEW PURCHASE</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
        <div class="add-shipment-name">
            <h2>CHECKOUT</h2><br>
        </div>

        <form class="shipment-form" method="POST" action="../PURCHASE/check.php">
            <label for="product-name">PRODUCT NAME</label>
            <select id="product-name" name="product-name" required>
                <?php
                include("../auth.php");
                include("../PURCHASE/dbpurchase.php");

                // Fetch product names and quantities from add_purchase table
                $sql = "SELECT productName, quantity FROM add_purchase";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["productName"] . "' data-quantity='" . $row["quantity"] . "'>" . $row["productName"] . "</option>";
                    }
                }
                ?>
            </select>

            <label for="item-quantity">ITEM QUANTITY</label>
            <input type="number" id="item-quantity" name="item-quantity" value="1" min="1" step="1">


            <label for="customer-name">CUSTOMER NAME</label>
            <input type="text" id="customer-name" name="customer-name" required>

            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email" required>

            <label for="phone-number">PHONE NUMBER</label>
            <input type="tel" id="phone-number" name="phone-number" required>

            <label for="shipping-address">SHIPPING ADDRESS</label>
            <textarea id="shipping-address" name="shipping-address" required></textarea>

            <label for="city">CITY</label>
            <input type="text" id="city" name="city" required>

            <label for="country">COUNTRY</label>
            <input type="text" id="country" name="country" required>

            <label for="zip-code">ZIP CODE</label>
            <input type="text" id="zip-code" name="zip-code" required>

            <div class="form-buttons">
                <button type="submit" class="submit" name="submit">CHECKOUT</button>
                <button type="reset" class="reset">CANCEL</button>
            </div>
        </form>
    </div>

    <script>
    document.getElementById('product-name').addEventListener('change', function() {
        var selectedIndex = this.selectedIndex;
        var quantity = this.options[selectedIndex].getAttribute('data-quantity');
        document.getElementById('item-quantity').value = quantity;
    });
    </script>

</body>
</html>