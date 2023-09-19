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

$id = $_SESSION['id'];


$sql = "SELECT * WHERE topic_id = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        return $row['project_id'];
        $_SESSION['newid'] = $_SESSION['newid'];
    }
} else {
    echo "0 results";
}

mysqli_close($conn);