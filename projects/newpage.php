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
    $content = fopen('pagecontent.txt', 'r');
    while (!feof($content)) {
        $file_content .= fread($content, 8192); 
    }
    fclose($content); // Close the file
    $txt = $file_content;
    fwrite($myfile, $txt);
    fclose($myfile);

}

// Send to new page
header("Location: ".$filename);

?>
