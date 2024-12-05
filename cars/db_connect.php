<?php
$host = "localhost";
$username = "root";       // Replace with your MySQL username
$password = "";           // Replace with your MySQL password
$dbname = "caryard";    // Replace with your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
