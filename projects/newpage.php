<?php
// Start session
session_start();

// Make new filename
$filename = $_POST['newpageid'].".php";

// Make session variables
$_SESSION['id'] = $_POST['newpageid'];


// Check if file exists. if not, make a new page (file)
if (!file_exists($filename)) {
    $myfile = fopen($filename, "w");
    $txt = "
    <?php require_once '../header.php';
        require_once '../function.php';
        ?>

        <div class='container form-add-project mt-5 p-5'>
            <h1 class='is-h1 text-center'>Project info</h1>
            <h2>". $_POST['newpageid']."</h2>
        </div>

    <?php
     ?>
    ";

    fwrite($myfile, $txt);
    fclose($myfile);

}

// Send to new page
header("Location: ".$filename);

?>
