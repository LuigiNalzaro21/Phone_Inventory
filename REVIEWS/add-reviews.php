<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../auth.php"); 

include("../REVIEWS/addrev.php");
include("../REVIEWS/dbreview.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD REVIEWS PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../REVIEWS/add-reviews.css">
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
            <div class="logo">REVIEWS</div>
            <ul class="nav-links">
                <li><a href="./reviews-overview.php" class="links">OVERVIEW</a></li>
                <li><a href="#" class="active">ADD REVIEWS</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
        <div class="add-shipment-name">
            <h2>ADD REVIEWS</h2><br>
        </div>
        <form class="shipment-form" method="POST" action="addrev.php">
            <div class="form-column">
                <label for="phone-brand">PHONE BRAND</label>
                <input type="text" id="phone-brand" name="phone-brand" placeholder="Phone Brand">
            </div>
            <div class="form-column">
                <label for="comment">COMMENT</label><br>
                <textarea id="comment" name="comment" rows="6" placeholder="Write your comment here"></textarea>
            </div>
            <div class="form-column">
                <label for="rating">RATING</label><br>
                <select id="rating" name="rating">
                    <option value="1">&#9733;</option>
                    <option value="2">&#9733;&#9733;</option>
                    <option value="3">&#9733;&#9733;&#9733;</option>
                    <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                    <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                </select>
            </div>
            <div class="form-buttons">
                <button type="submit" name="submit" class="submit">SUBMIT</button>
                <button type="reset" class="reset">RESET</button>
            </div>
        </form>
    </div>

</body>
</html>
