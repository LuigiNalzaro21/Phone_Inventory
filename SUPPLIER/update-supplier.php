<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../SUPPLIER/dbsupplier.php");

if(isset($_POST['submit'])) {
    // Retrieve data from the form
    $supplierName = $_POST['supplier']; // Change to supplier name
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $Email = $_POST['Email'];
    $phoneNum = $_POST['phoneNum'];
    $address = $_POST['address'];
    
    // Update supplier information in the database
    $sql = "UPDATE add_supplier SET firstName='$firstName', lastName='$lastName', Email='$Email', phoneNum='$phoneNum', address='$address' WHERE CONCAT(firstName, ' ', lastName) = '$supplierName'";
    if ($conn->query($sql) === TRUE) {
        header("Location: update-supplier.php?success=true");
        exit();
    } else {
        echo "Error updating supplier information: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUPPLIER/ UPDATE SUPPLIER PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../SUPPLIER/update-supplier.css">
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
            <div class="logo">SUPPLIER</div>
            <ul class="nav-links">
                <li><a href="./supplier-overview.php" class="links">OVERVIEW</a></li>
                <li><a href="#" class="active">UPDATE SUPPLIER</a></li>
                <li><a href="./add-supplier.php" class="links">ADD SUPPLIER</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
        <div class="add-shipment-name">
            <h2>UPDATE SUPPLIER</h2><br>
        </div>
        <form class="shipment-form" method="post" action="update-supplier.php"><br><br>
            <!-- Select option for choosing a supplier to update -->
            <label for="supplier">SELECT SUPPLIER:</label>
            <select id="supplier" name="supplier">
                <?php
                // Fetch and display all suppliers from the database
                $sql = "SELECT * FROM add_supplier";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['firstName'] . " " . $row['lastName'] . "'>" . $row['firstName'] . " " . $row['lastName'] . "</option>";
                    }
                }
                ?>
            </select>

            <!-- Input fields for updating supplier information -->
            <label for="firstName">FIRST NAME</label>
            <input type="text" id="firstName" name="firstName" placeholder="Enter first name">
            <label for="lastName">LAST NAME</label>
            <input type="text" id="lastName" name="lastName" placeholder="Enter last name">
            <label for="Email">EMAIL</label>
            <input type="email" id="Email" name="Email" placeholder="Enter email">
            <label for="phoneNum">PHONE NUMBER</label>
            <input type="text" id="phoneNum" name="phoneNum" placeholder="Enter phone number">
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
