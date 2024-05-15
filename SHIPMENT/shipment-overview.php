<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../WARRANTY/dbwarranty.php");

// Fetch data from the add_shipment table
$sql = "SELECT * FROM add_shipment";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHIPMENT OVERVIEW PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../SHIPMENT/shipment-overview.css">
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
                <li><a href="#" class="active">OVERVIEW</a></li>
                <li><a href="../SHIPMENT/shipment-add-supplier.php" class="links">ADD SHIPMENT</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="con">
        <h2>OVERVIEW</h2><br>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Supplier Name</th>
                            <th>Supplier ID</th>
                            <th>Model Name</th>
                            <th>Quantity</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Brand Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["supplier_name"] . "</td>";
                                echo "<td>" . $row["supplier_id"] . "</td>";
                                echo "<td>" . $row["model_name"] . "</td>";
                                echo "<td>" . $row["quantity"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["number"] . "</td>";
                                echo "<td>" . $row["brand_name"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

</body>
</html>
