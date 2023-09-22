<html>
    <form method="post">
        <input name="link" type="text" placeholder="Link">
        <input name="submit" type="submit">
    </form>
    <form method="post">
        <input type="text" placeholder="main link to delete" name="delete_link">
        <input type="submit" name="delete">
    </form>
    <form method="post">
        <input type="submit" name="all_links">
    </form>
</html>

<?php
if (isset($_POST['submit'])) {
    $link = $_POST['link'];
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "links";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM links WHERE main_link='$link'";
    $result = $conn->query($sql);
    $num_results = mysqli_num_rows($result);
    echo "<b>" .$num_results. " Resultaten</b><br><br>";

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>Link: ".$row['link_name'];
    }
    } else {
    echo "0 results";
    }
    $conn->close();
}



if (isset($_POST['delete'])) {
    $delete_link = $_POST['delete_link'];
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "links";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // sql to delete a record
    $sql = "DELETE FROM links WHERE main_link='$delete_link'";

    if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}

if (isset($_POST['all_links'])) {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "links";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM links";
    $result = $conn->query($sql);
    $num_results = mysqli_num_rows($result);
    echo "<b>" .$num_results. " Resultaten</b><br><br>";

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>Link: ".$row['link_name'];
    }
    } else {
    echo "0 results";
    }
    $conn->close();
}
?>