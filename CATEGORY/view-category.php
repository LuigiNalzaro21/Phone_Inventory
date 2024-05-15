<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../CATEGORY/db-category.php"); // Include the database connection file

// Fetch data from the add_category table
$sql = "SELECT * FROM add_category";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORY/ VIEW CATEGORY PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CATEGORY/view-category.css">
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
            <div class="logo">CATEGORY</div>
            <ul class="nav-links">
                <li><a href="./add-category.php" class="links">ADD CATEGORY</a></li>
                <li><a href="./edit-category.php" class="links">EDIT CATEGORY</a></li>
                <li><a href="./delete-category.php" class="links">DELETE CATEGORY</a></li>
                <li><a href="#" class="active">VIEW CATEGORY</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="con">
        <h2>VIEW CATEGORY</h2><br>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["category"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='1'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>
</html>
