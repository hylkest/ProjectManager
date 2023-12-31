<?php require_once "header.php"; 
session_start();
if ($_SESSION['loggedin'] != "1" ) {
    header("Location: login.php");
}
?>
<html>
<body>
    <div class="container form-add-project mt-5 p-5">
        <h1 class="is-h1 text-center">Add new project</h1>
        <form class="mt-3" method="post" style="width: 50%;margin:0 auto;">
            <input class="form-control mt-2" type="text" placeholder="Project title" name="title" required>
            <input class="form-control mt-2" type="text" placeholder="Project Description" name="description">
            <textarea class="form-control mt-2" placeholder="Project information" name="content"></textarea>
            <input class="form-control mt-2" type="text" placeholder="Project manager" name="author" required>
            <select class="form-control mt-2" name="category">
                <option selected disabled>Category</option>
                <?php include_once 'products.php'; ?>
            </select>
            <input class="form-control mt-2" type="text" placeholder="Project expenses" name="project_expenses">
            <input class="form-control mt-2" type="text" placeholder="Expected yield" name="expected_yield">
            <input class="form-control mt-2 btn btn-primary" type="submit" name="submit">
        </form>
    </div>
</body>
</html>
<?php

if (isset($_POST['submit'])) {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "docs";

// Form variables
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $expenses = $_POST['project_expenses'];
    $expected_yield = $_POST['expected_yield'];

    if (!ctype_digit($expenses)) {
        echo "<div style='margin: 0 auto;width: 25%;' class='alert alert-primary text-center mt-3' role='alert'>
    You didn't fill in a number.
    </div>";
    }


// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO topics (project_title, project_small_desc, project_content, project_manager, project_category, project_expenses, expected_yield)
VALUES ('$title', '$desc', '$content', '$author', '$category', '$expenses', '$expected_yield')";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='margin: 0 auto;width: 25%;' class='alert alert-primary text-center mt-3' role='alert'>
  New project created successfully
</div>";
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>
<html>
    <div style="display: flex;justify-content: center;">
</html>

<?php
$con = mysqli_connect("localhost", "root", "root", "docs");
$sql = "SELECT * from topics";
if ($result = mysqli_query($con, $sql)) {
    $rowcount = mysqli_num_rows($result);
    echo "<div class='subrow'><div class='row1'><div class='totalrows'><h1 class='text-center' style='border: 3px solid white;width:100px;margin:10px auto;padding: 20px 20px 20px 20px;border-radius:50%;'>".$rowcount."</h1>
    <h3 class='text-center'>Total projects</h3></div>";
}
$con = mysqli_connect("localhost", "root", "root", "docs");
$sql = "SELECT * from topics WHERE project_category='Onepager'";
if ($result = mysqli_query($con, $sql)) {
    $rowcount = mysqli_num_rows($result);
    echo "<div class='totalrows'><h1 class='text-center' style='border: 3px solid white;width:100px;margin:10px auto;padding: 20px 20px 20px 20px;border-radius:50%;'>".$rowcount."</h1>
    <h3 class='text-center'>Onepagers</h3></div></div>";
}
$sql = "SELECT * from topics WHERE project_category='Narrowcasting'";
if ($result = mysqli_query($con, $sql)) {
    $rowcount = mysqli_num_rows($result);
    echo "<div class='row2'><div class='totalrows'><h1 class='text-center' style='border: 3px solid white;width:100px;margin:10px auto;padding: 20px 20px 20px 20px;border-radius:50%;'>".$rowcount."</h1>
    <h3 class='text-center'>Narrowcastings</h3></div></div>";
}
$sql = "SELECT * from topics WHERE project_category='Website'";
if ($result = mysqli_query($con, $sql)) {
    $rowcount = mysqli_num_rows($result);
    echo "<div class='totalrows tt2'><h1 class='text-center' style='border: 3px solid white;width:100px;margin:10px auto;padding: 20px 20px 20px 20px;border-radius:50%;'>".$rowcount."</h1>
    <h3 class='text-center'>Website</h3></div></div></div>";
}
$sql = "SELECT * from topics WHERE project_category='Ticketshop'";
if ($result = mysqli_query($con, $sql)) {
    $rowcount = mysqli_num_rows($result);
    echo "<div class='subrow2'><div class='row3'><div class='totalrows'><h1 class='text-center' style='border: 3px solid white;width:100px;margin:10px auto;padding: 20px 20px 20px 20px;border-radius:50%;'>".$rowcount."</h1>
    <h3 class='text-center'>Ticketshops</h3></div>";
}
$sql = "SELECT * from topics WHERE project_category='Intranet'";
if ($result = mysqli_query($con, $sql)) {
    $rowcount = mysqli_num_rows($result);
    echo "<div class='totalrows'><h1 class='text-center' style='border: 3px solid white;width:100px;margin:10px auto;padding: 20px 20px 20px 20px;border-radius:50%;'>".$rowcount."</h1>
    <h3 class='text-center'>Intranets</h3></div></div>";
}
$sql = "SELECT * from topics WHERE project_category='Webshop'";
if ($result = mysqli_query($con, $sql)) {
    $rowcount = mysqli_num_rows($result);
    echo "<div class='row4'><div class='totalrows'><h1 class='text-center' style='border: 3px solid white;width:100px;margin:10px auto;padding: 20px 20px 20px 20px;border-radius:50%;'>".$rowcount."</h1>
    <h3 class='text-center'>Webshops</h3><div>";
}
$sql = "SELECT * from topics WHERE project_category='Overig'";
if ($result = mysqli_query($con, $sql)) {
    $rowcount = mysqli_num_rows($result);
    echo "<div class='totalrows'><h1 class='text-center' style='border: 3px solid white;width:100px;margin:10px auto;padding: 20px 20px 20px 20px;border-radius:50%;'>".$rowcount."</h1>
    <h3 class='text-center'>Overig</h3><div></div>";
}
mysqli_close($con);
?>

<html>
</div>
</html>

<?php 
require_once 'footer.php'; 
?>
