<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("../EMPLOYEE/dbemployee.php");

if(isset($_POST['submit'])) {
    // Retrieve data from the form
    $employeeName = $_POST['employee']; // Change to employee name
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $position = $_POST['position'];
    $phoneNum = $_POST['phoneNum'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    
    // Update employee information in the database
    $sql = "UPDATE add_employee SET firstName='$firstName', lastName='$lastName', position='$position', phoneNum='$phoneNum', address='$address', department='$department' WHERE CONCAT(firstName, ' ', lastName) = '$employeeName'";
    if ($conn->query($sql) === TRUE) {
        header("Location: employee-update.php?success=true");
        exit();
    } else {
        echo "Error updating employee information: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLOYEE/ UPDATE PAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../EMPLOYEE/employee-update.css">
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
                <li><a href="#" class="active">UPDATE EMPLOYEE</a></li>
                <li><a href="./add-employee.php" class="links">ADD EMPLOYEE</a></li>
                <li class="back-button"><a href="../dashboard.php"class="fas fa-arrow-left"></a></li>
            </ul>
        </nav>
    </header>
    <!-- Navbar 2 -->

    <div class="add-shipment-container">
        <div class="add-shipment-name">
            <h2>UPDATE EMPLOYEE</h2><br>
        </div>
        <form class="shipment-form" method="post" action="employee-update.php"><br><br>
            <!-- Select option for choosing an employee to update -->
            <label for="employee">SELECT EMPLOYEE:</label>
            <select id="employee" name="employee">
                <?php
                // Fetch and display all employees from the database
                $sql = "SELECT * FROM add_employee";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['firstName'] . " " . $row['lastName'] . "'>" . $row['firstName'] . " " . $row['lastName'] . "</option>";
                    }
                }
                ?>
            </select>

            <!-- Input fields for updating employee information -->
            <label for="firstName">FIRST NAME</label>
            <input type="text" id="firstName" name="firstName" placeholder="Enter first name">
            <label for="lastName">LAST NAME</label>
            <input type="text" id="lastName" name="lastName" placeholder="Enter last name">
            <label for="position">POSITION</label>
            <input type="text" id="position" name="position" placeholder="Enter position">
            <label for="phoneNum">PHONE NUMBER</label>
            <input type="text" id="phoneNum" name="phoneNum" placeholder="Enter phone number">
            <label for="address">ADDRESS</label>
            <input type="text" id="address" name="address" placeholder="Enter address">
            <label for="department">DEPARTMENT</label>
            <input type="text" id="department" name="department" placeholder="Enter department">
            
            <!-- Submit and Reset buttons -->
            <div class="form-buttons">
                <button type="submit" name="submit" class="submit">SUBMIT</button>
                <button type="reset" class="reset">RESET</button>
            </div>
        </form>
    </div>

</body>
</html>
