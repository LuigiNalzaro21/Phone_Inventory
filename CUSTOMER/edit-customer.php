<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../auth.php"); 
include("../CUSTOMER/dbcustomer.php"); 

// Fetch data from the add_customer table
$sql = "SELECT * FROM add_customer";
$result = $conn->query($sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $customer_to_edit = $_POST['customer_to_edit'];
        $first_name = $_POST['first-name'];
        $last_name = $_POST['last-name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone-number'];
        $purchased_items = $_POST['purchased-items'];

        // Update the record in the database
        $sql_update = "UPDATE add_customer SET first_name='$first_name', last_name='$last_name', email='$email', phone_number='$phone_number', purchased_items='$purchased_items' WHERE first_name='$customer_to_edit'";

        if ($conn->query($sql_update) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMER/ EDIT CUSTOMER PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CUSTOMER/edit-customer.css">
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
            <div class="logo">CATEGORY</div>
            <ul class="nav-links">
                <li><a href="./add-customer.php" class="links">ADD CUSTOMER</a></li>
                <li><a href="#" class="active">EDIT CUSTOMER</a></li>
                <li><a href="./delete-customer.php" class="links">DELETE CUSTOMER</a></li>
                <li><a href="./view-customer.php" class="links">VIEW CUSTOMER</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
            <div class="add-shipment-name">
                <h2>EDIT CUSTOMER</h2><br>
            </div>
        <form class="shipment-form" method="POST"> <!-- Added method and action attributes -->
            <label for="customer_to_edit">CUSTOMER TO EDIT</label>
            <select id="customer_to_edit" name="customer_to_edit">
                <option value="">SELECT CUSTOMER</option>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["first_name"] . "'>" . $row["first_name"] . " " . $row["last_name"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No customers available</option>";
                }
                ?>
            </select>
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
            <div class="form-buttons">
                <button type="submit" class="submit" name="submit">SUBMIT</button>
                <button type="reset" class="reset">RESET</button>
            </div>
        </form>
    </div>

</body>
</html>
