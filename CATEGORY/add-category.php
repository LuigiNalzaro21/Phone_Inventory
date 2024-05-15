<?php
session_start();
// for username
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}


include("../CATEGORY/add-C.php");
include("../CATEGORY/db-category.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORY/ ADD CATEGORY PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CATEGORY/add-category.css">
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
                <li><a href="#" class="active">ADD CATEGORY</a></li>
                <li><a href="./edit-category.php" class="links">EDIT CATEGORY</a></li>
                <li><a href="./delete-category.php" class="links">DELETE CATEGORY</a></li>
                <li><a href="./view-category.php" class="links">VIEW CATEGORY</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

        <div class="add-shipment-container">
            <div class="add-shipment-name">
                <h2>ADD CATEGORY</h2><br>
            </div>
            <form class="shipment-form" method="POST" action="add-C.php"> <!-- Added method and action attributes -->
                <label for="category">NEW CATEGORY</label>
                <select id="category" name="category">
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