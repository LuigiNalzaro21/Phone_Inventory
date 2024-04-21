<?php
include("../PHONE/dbphone.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $brand = mysqli_real_escape_string($conn, $_POST['phone-brand']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);

    $stmt = $conn->prepare("INSERT INTO add_reviews (brand, comment, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $brand, $comment, $rating);    

    try {
        if ($stmt->execute()) {
            header("Location: add-reviews.php?success=true");
            exit();
        } else {
            echo "Error: Unable to add review. Please try again later.";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
    $conn->close();
}
?>
