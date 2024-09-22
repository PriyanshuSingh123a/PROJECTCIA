<?php
// Include the database connection file
include 'db_connect.php';

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $published_year = $_POST['published_year'];
    $genre = $_POST['genre'];

    // Use prepared statements to update the book details
    $stmt = $conn->prepare("UPDATE Books SET title = ?, author = ?, published_year = ?, genre = ? WHERE book_id = ?");
    $stmt->bind_param("ssisi", $title, $author, $published_year, $genre, $book_id);

    if ($stmt->execute()) {
        echo "Book updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
