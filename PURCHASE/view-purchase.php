<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../PURCHASE/dbcheckout.php"); // Include the file for database connection

// Fetch data from the checkout table
$sql = "SELECT * FROM checkout";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PURCHASE/ VIEW PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../PURCHASE/view-purchase.css">
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
                <li><a href="./add-purchase.php" class="links">ADD PURCHASE</a></li>
                <li><a href="./checkout.php" class="links">CHECKOUT</a></li>
                <li><a href="#" class="active">VIEW PURCHASE</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="con">
        <h2>VIEW PURCHASE</h2><br>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Shipping Address</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Zip Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["productName"] . "</td>";
                                echo "<td>" . $row["quantity"] . "</td>";
                                echo "<td>" . $row["customerName"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["phoneNumber"] . "</td>";
                                echo "<td>" . $row["shippingAddress"] . "</td>";
                                echo "<td>" . $row["city"] . "</td>";
                                echo "<td>" . $row["country"] . "</td>";
                                echo "<td>" . $row["zipCode"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

</body>
</html>
