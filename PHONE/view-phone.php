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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHONE/ VIEW PHONE PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../PHONE/view-phone.css">
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
                <li><a href="./delete-phone.php" class="links">DELETE PHONE</a></li>
                <li><a href="#" class="active">VIEW PHONE</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="con">
        <h2>VIEW PHONE</h2><br>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Model</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>In Stock</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["model"] . "</td>";
                                echo "<td>" . $row["brand"] . "</td>";
                                echo "<td>" . $row["price"] . "</td>";
                                echo "<td>" . $row["stock"] . "</td>";
                                echo "<td>" . $row["category"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='255'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

</body>
</html>
