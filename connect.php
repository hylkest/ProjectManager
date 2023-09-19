<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "docs";

// Form variables
$title = $_POST['title'];
$desc = $_POST['description'];
$content = $_POST['content'];
$author = $_POST['author'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}