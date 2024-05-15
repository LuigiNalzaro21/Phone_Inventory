<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../PHONE/dbphone.php");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $model_to_delete = $_POST['category'];

        // Delete the record from the database
        $sql_delete = "DELETE FROM add_phone WHERE model='$model_to_delete'";

        if ($conn->query($sql_delete) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

// Fetch data from the add_phone table
$sql = "SELECT * FROM add_phone";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHONE/ DELETE PHONE PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../PHONE/delete-phone.css">
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
                <li><a href="./edit-phone.php" class="links">EDIT PHONE</a></li>
                <li><a href="#" class="active">DELETE PHONE</a></li>
                <li><a href="./view-phone.php" class="links">VIEW PHONE</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
        <div class="add-shipment-name">
            <h2>DELETE PHONE</h2><br>
        </div>
        <form class="shipment-form" method="POST"> <!-- Added method and action attributes -->
            <label for="category">MODEL TO DELETE</label><br><br>
            <select id="category" name="category">
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
            <div class="form-buttons">
                <button type="submit" class="submit" name="submit">YES</button>
                <button type="reset" class="reset">NO</button>
            </div>
        </form>
    </div>

</body>
</html>
