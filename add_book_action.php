<?php
// Include the database connection file
include 'db_connect.php';

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $published_year = $_POST['published_year'];
    $genre = $_POST['genre'];

    // Prepare and execute the SQL query to insert the new book
    $stmt = $conn->prepare("INSERT INTO Books (title, author, published_year, genre) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $title, $author, $published_year, $genre);

    if ($stmt->execute()) {
        echo "Book added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
