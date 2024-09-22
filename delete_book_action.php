<?php
// Include the database connection file
include 'db_connect.php';

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];

    // Use prepared statements to delete the book
    $stmt = $conn->prepare("DELETE FROM Books WHERE book_id = ?");
    $stmt->bind_param("i", $book_id);

    if ($stmt->execute()) {
        echo "Book deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
