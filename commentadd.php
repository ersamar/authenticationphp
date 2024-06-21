<?php
session_start();
include("connection.php");

if (!empty($_SESSION['user_email'])) {
    if (isset($_POST["comment"])) {
        $comment = $_POST['comment'];
        $email = $_SESSION['user_email'];

        // Use prepared statement to prevent SQL injection
        $sql = "INSERT INTO comments (user_email, comment) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $comment);

        if ($stmt->execute()) {
            echo "Comment Added Successfully";
            header('location:comment.php');
        } else {
            // Log the error for debugging purposes
            error_log("Error: " . $stmt->error);
            echo "Couldn't add Comment. Please try again later.";
        }

        // Close the statement
        $stmt->close();
        // Close the connection
        $conn->close();
    } else {
        echo "Error: Comment parameter is missing.";
    }
} else {
    header('location:signin.php');
    exit();  // Ensure that no code is executed after the header redirection
}
?>
