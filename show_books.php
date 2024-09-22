<?php
// Include the database connection file
include 'db_connect.php';

// Fetch all books from the Books table
$sql = "SELECT * FROM Books";
$result = $conn->query($sql);

// Display the list of books
if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["title"] . " by " . $row["author"] . " (" . $row["published_year"] . ") - Genre: " . $row["genre"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No books available.";
}

$conn->close();
?>
