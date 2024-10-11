<?php
// db.php
$servername = "localhost";
$username = "root"; // Default MySQL username for XAMPP
$password = "";     // Default MySQL password for XAMPP (empty)
$dbname = "library_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
