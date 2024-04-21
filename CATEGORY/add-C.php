<?php
include("../PHONE/dbphone.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    $stmt = $conn->prepare("INSERT INTO add_category (category) VALUES (?)");
    $stmt->bind_param("s", $category);

    try {
        if ($stmt->execute()) {
            header("Location: add-category.php?success=true");
            exit();
        } else {
            echo "Error: Unable to add category. Please try again later.";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
    $conn->close();
}
?>
