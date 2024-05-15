<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}


include("../EMPLOYEE/add-emp.php"); 
include("../EMPLOYEE/dbemployee.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLOYEE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../EMPLOYEE/add-employee.css">
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
            <div class="logo">EMPLOYEE</div>
            <ul class="nav-links">
                <li><a href="./overview-employee.php" class="links">OVERVIEW</a></li>
                <li><a href="./employee-update.php" class="links">UPDATE EMPLOYEE</a></li>
                <li><a href="#" class="active">ADD EMPLOYEE</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
        <div class="add-shipment-name">
            <h2>ADD EMPLOYEE</h2><br>
        </div>
        <form class="shipment-form" method="post" action="add-emp.php">
            <label for="first-name">FIRST NAME</label>
            <input type="text" id="first-name" name="firstName" placeholder="Enter first name">
            <label for="last-name">LAST NAME</label>
            <input type="text" id="last-name" name="lastName" placeholder="Enter last name">
            <label for="position">POSITION</label>
            <input type="text" id="position" name="position" placeholder="Enter position">
            <label for="phone-number">PHONE NUMBER</label>
            <input type="text" id="phone-number" name="phoneNum" placeholder="Enter phone number">
            <label for="address">ADDRESS</label>
            <input type="text" id="address" name="address" placeholder="Enter address">
            <label for="department">DEPARTMENT</label>
            <input type="text" id="department" name="department" placeholder="Enter department">
            <div class="form-buttons">
                <button type="submit" class="submit" name="submit">SUBMIT</button>
                <button type="reset" class="reset">RESET</button>
            </div>
        </form>
    </div>

</body>
</html>
