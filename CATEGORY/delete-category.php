<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../auth.php"); 
include("../CATEGORY/db-category.php");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $category_to_delete = mysqli_real_escape_string($conn, $_POST['category']);

    // Delete the record from the database
    $sql_delete = "DELETE FROM add_category WHERE category='$category_to_delete'";

    if ($conn->query($sql_delete) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from the add_category table
$sql = "SELECT * FROM add_category";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORY/ DELETE CATEGORY PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CATEGORY/delete-category.css">
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
                <li><a href="./add-category.php" class="links">ADD CATEGORY</a></li>
                <li><a href="./edit-category.php" class="links">EDIT CATEGORY</a></li>
                <li><a href="#" class="active">DELETE CATEGORY</a></li>
                <li><a href="./view-category.php" class="links">VIEW CATEGORY</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
            <div class="add-shipment-name">
                <h2>DELETE CATEGORY</h2><br>
            </div>
        <form class="shipment-form" method="POST">
            <center><h3>Are you sure you want to delete the following category?</h3></center>
            <label for="category">CATEGORY TO DELETE</label>
            <select id="category" name="category">
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["category"] . "'>" . $row["category"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No categories available</option>";
                }
                ?>
            </select>
            <div class="form-buttons">
                <button type="submit" class="submit" name="submit">DELETE</button>
                <button type="reset" class="reset">CANCEL</button>
            </div>
        </form>
    </div>

</body>
</html>
