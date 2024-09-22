<?php
// Database connection details
$servername = "localhost";   // Server where MySQL is hosted
$username = "root";          // MySQL username (default for XAMPP is 'root')
$password = "";              // MySQL password (default is empty for 'root' on XAMPP)
$dbname = "ciafold"; // Name of the database you're connecting to

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
