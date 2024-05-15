<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../PHONE/dbphone.php"); 

// Fetch data from the add_phone table
$sql = "SELECT * FROM add_phone";
$result = $conn->query($sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $model_to_edit = $_POST['model_to_edit'];
        $model = $_POST['model'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $category = $_POST['category'];

        // Update the record in the database
        $sql_update = "UPDATE add_phone SET model='$model', brand='$brand', price='$price', stock='$stock', category='$category' WHERE model='$model_to_edit'";

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
    <title>PHONE/ EDIT PHONE PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../PHONE/edit-phone.css">
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
            <div class="logo">PHONE</div>
            <ul class="nav-links">
                <li><a href="./add-phone.php" class="links">ADD PHONE</a></li>
                <li><a href="#" class="active">EDIT PHONE</a></li>
                <li><a href="./delete-phone.php" class="links">DELETE PHONE</a></li>
                <li><a href="./view-phone.php" class="links">VIEW PHONE</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
        <div class="add-shipment-name">
            <h2>EDIT PHONE</h2><br>
        </div>
        <form class="shipment-form" method="POST"> <!-- Added method and action attributes -->
            <label for="model_to_edit">MODEL TO EDIT</label>
            <select id="model_to_edit" name="model_to_edit">
                <option value="">SELECT PHONE</option>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["model"] . "'>" . $row["model"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No phones available</option>";
                }
                ?>
            </select>
            <label for="model">MODEL</label>
            <input type="text" id="model" name="model">
            <label for="brand">BRAND</label>
            <input type="text" id="brand" name="brand">
            <label for="price">PRICE</label>
            <input type="price" id="price" name="price">
            <label for="stock">IN STOCK</label>
            <input type="text" id="stock" name="stock">
            <label for="category">CATEGORY</label>
            <select id="category" name="category">
                <option value="">SELECT CATEGORY</option>
                <option value="Android OS">Android OS</option>
                <option value="Apple OS">Apple OS</option>
            </select>
            <div class="form-buttons">
                <button type="submit" class="submit" name="submit">SUBMIT</button>
                <button type="reset" class="reset">RESET</button>
            </div>
        </form>
    </div>

</body>
</html>
