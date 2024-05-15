<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../WARRANTY/dbwarranty.php");

// Fetch data from the add_warranty table
$sql = "SELECT * FROM add_warranty";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WARRANTY OVERVIEW PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../WARRANTY/warranty-overview.css">
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
                <a href="../index.php" class="fas fa-user-circle"></a> 
            </div>
        </div>
    </nav>

    <!-- Navbar 2 -->
    <header>
        <nav>
            <div class="logo">WARRANTY</div>
            <ul class="nav-links">
                <li><a href="#" class="active">OVERVIEW</a></li>
                <li><a href="./warranty-add-warranty.php" class="links">ADD WARRANTY</a></li>
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
                            <th>Customer Name</th>
                            <th>Customer ID</th>
                            <th>Model Name</th>
                            <th>Supplier Name</th>
                            <th>Phone Number</th>
                            <th>Brand Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["customer_name"] . "</td>";
                                echo "<td>" . $row["customer_id"] . "</td>";
                                echo "<td>" . $row["model_name"] . "</td>";
                                echo "<td>" . $row["supplier_name"] . "</td>";
                                echo "<td>" . $row["phone_num"] . "</td>";
                                echo "<td>" . $row["brand_name"] . "</td>";
                                echo "<td>" . $row["start_date"] . "</td>";
                                echo "<td>" . $row["end_date"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

</body>
</html>
