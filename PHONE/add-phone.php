<?php
session_start();
// for username
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
} 

include("../PHONE/add.php");
include("../PHONE/dbphone.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHONE/ ADD PHONE PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../PHONE/add-phone.css">
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
                <li><a href="#" class="active">ADD PHONE</a></li>
                <li><a href="./edit-phone.php" class="links">EDIT PHONE</a></li>
                <li><a href="./delete-phone.php" class="links">DELETE PHONE</a></li>
                <li><a href="./view-phone.php" class="links">VIEW PHONE</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
        <div class="add-shipment-name">
            <h2>ADD PHONE</h2><br>
        </div>
        <form class="shipment-form" method="POST"> <!-- Added method and action attributes -->
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
                <option value="Android OS">Android OS</option>
                <option value="Apple OS">Apple OS</option>
            </select>
            <div class="form-buttons">
                <button type="submit" class="submit" name="submit">SUBMIT</button> <!-- Added name attribute to the submit button -->
                <button type="reset" class="reset">RESET</button>
            </div>
        </form>
    </div>

    <script>
    $(document).ready(function(){
        $('.shipment-form').submit(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'add-phone.php',
                data: $('.shipment-form').serialize(),
                success: function(response){
                    if(response.trim() == 'success'){
                        $('.success-message').html('Phone added successfully.');
                    } else {
                        $('.error-message').html(response);
                    }
                }
            });
        });
    });
    </script>

</body>
</html>