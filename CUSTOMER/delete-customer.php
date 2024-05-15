<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../CUSTOMER/dbcustomer.php");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $customer_to_delete = explode(" ", $_POST['category']);
        $first_name = $customer_to_delete[0];
        $last_name = $customer_to_delete[1];

        // Delete the record from the database
        $sql_delete = "DELETE FROM add_customer WHERE first_name='$first_name' AND last_name='$last_name'";

        if ($conn->query($sql_delete) === TRUE) {
            // Record deleted successfully
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

// Fetch data from the add_customer table
$sql = "SELECT * FROM add_customer";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMER/ DELETE CUSTOMER PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CUSTOMER/delete-customer.css">
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
            <div class="logo">CATEGORY</div>
            <ul class="nav-links">
                <li><a href="./add-customer.php" class="links">ADD CUSTOMER</a></li>
                <li><a href="./edit-customer.php" class="links">EDIT CUSTOMER</a></li>
                <li><a href="#" class="active">DELETE CUSTOMER</a></li>
                <li><a href="./view-customer.php" class="links">VIEW CUSTOMER</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
        <div class="add-shipment-name">
            <h2>DELETE CUSTOMER</h2><br>
        </div>
        <form class="shipment-form" method="POST"> <!-- Added method and action attributes -->
            <label for="category">CUSTOMER TO DELETE</label><br><br>
            <select id="category" name="category" onchange="showCustomerName(this.value)">
                <option value="">SELECT CUSTOMER</option>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["first_name"] . " " . $row["last_name"] . "'>" . $row["first_name"] . " " . $row["last_name"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No customers available</option>";
                }
                ?>
            </select>
            <div class="centered">
                <h3>CUSTOMER NAME:</h3>
                <h3 id="customerNameDisplay">Name Displayed</h3>
            </div>
            <center><h3>Are you sure you want to delete the following customer?</h3></center>
            <div class="form-buttons">
                <button type="submit" class="submit" name="submit">YES</button>
                <button type="reset" class="reset">NO</button>
            </div>
        </form>
    </div>

    <script>
        function showCustomerName(name) {
            document.getElementById("customerNameDisplay").innerText = name;
        }
    </script>

</body>
</html>
