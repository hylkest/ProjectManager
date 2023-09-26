<?php require_once "header.php"; 
session_start();
if ($_SESSION['loggedin'] != "1" ) {
    header("Location: login.php");
}

/*
@todo MAKE FILTER FOR THE PROJECTS
*/
require_once 'connect.php';

$sql = "SELECT * FROM topics";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    ?>
<html>
    <br>
    <div style="display: flex;">
        <form method="post" style="display: flex; margin-right:10px;margin-left:10px;">
            <select class="form-control">
                <?php include_once 'products.php' ?>
            </select>
            <input class="btn btn-primary" style="margin-left: 5px;" type="submit" name="filter" value="Filter">
        </form>
        <form method="post" style="display: flex;">
            <input type="text" class="form-control" placeholder="Search project name">
            <input type="submit" class="btn btn-primary" style="margin-left: 5px;" value="Search">
        </form>
    </div>
<table class="table table-dark table-striped">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Project</th>
        <th scope="col">Description</th>
        <th scope="col">Project manager</th>
        <th scope="col">Date added</th>
        <th scope="col">Category</th>
        <th scope="col">Status</th>
        <th scope="col">Action</tr>
    </tr>
    </thead>
    <tbody>
    <?php
        while($row = $result->fetch_assoc()) {
        echo "<tr><th scope='row'>" . $row["project_id"]. "</th><td>" . $row["project_title"]. "</td><td>" . $row["project_small_desc"]. "</td><td>". $row["project_manager"] ."</td><td>". $row["project_date"] ."</td><td>". $row["project_category"] ."</td><td>". $row["project_status"] ."</td><td><form method='get' onsubmit='confirmDelete(event)' id='".$row['project_id']."'><input type='hidden' name='formid' value='".$row['project_id']."'><input type='submit' value='Delete' class='btn btn-danger' name='test' form=".$row['project_id']."></form><form style='margin-bottom:0px;' method='post' action='projects/newpage.php' ><input type='hidden' name='newpageid' value='".$row['project_id']."'><input type='submit' value='Edit' name='newpage' class='btn btn-primary' style='margin-top: 5px;'></form></td></tr>";
    }
    }

echo $_POST['formid'];
    ?>
    </tbody>
</table>
</html>

<?php

if (isset($_GET['test'])) {
    $formid = $_GET['formid'];
    $sql1 = "DELETE FROM topics WHERE project_id='$formid'";

    if ($conn->query($sql1) === TRUE) {
        header('Location: list.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>


