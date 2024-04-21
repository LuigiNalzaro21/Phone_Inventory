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
    $category_to_edit = mysqli_real_escape_string($conn, $_POST['category_to_edit']);
    $new_category = mysqli_real_escape_string($conn, $_POST['new_category']);

    $stmt = $conn->prepare("UPDATE add_category SET category=? WHERE category=?");
    $stmt->bind_param("ss", $new_category, $category_to_edit);

    try {
        if ($stmt->execute()) {
            header("Location: edit-category.php?success=true");
            exit();
        } else {
            echo "Error: Unable to edit category. Please try again later.";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORY/ EDIT CATEGORY PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CATEGORY/edit-category.css">
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
                <li><a href="#" class="active">EDIT CATEGORY</a></li>
                <li><a href="./delete-category.php" class="links">DELETE CATEGORY</a></li>
                <li><a href="./view-category.php" class="links">VIEW CATEGORY</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
            <div class="add-shipment-name">
                <h2>EDIT CATEGORY</h2><br>
            </div>
        <form class="shipment-form" method="POST">
            <label for="category_to_edit">CATEGORY TO EDIT</label>
            <select id="category_to_edit" name="category_to_edit">
                <option value="">SELECT CATEGORY</option>
                <?php
                $sql = "SELECT category FROM add_category";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["category"] . "'>" . $row["category"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No categories available</option>";
                }
                ?>
            </select>
            <label for="new_category">NEW CATEGORY</label>
            <select id="new_category" name="new_category">
                <option value="Android OS">Android OS</option>
                <option value="Iphone OS">Iphone OS</option>
            </select>
            <div class="form-buttons">
                <button type="submit" class="submit" name="submit">SUBMIT</button>
                <button type="reset" class="reset">RESET</button>
            </div>
        </form>
    </div>

</body>
</html>
