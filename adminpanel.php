<?php 
session_start();
if ($_SESSION['isadmin'] != "1" ) {
    header("Location: index.php");
}

require_once 'header.php';

?>

<html>
    <h1>Database settings</h1>
    <form method="post">
        <input type="text" placeholder="Database host" name="db_host">
        <input type="text" placeholder="Database username" name="db_uname">
        <input type="text" placeholder="Database password" name="db_pass">
        <input type="text" placeholder="Database name" name="db_name">
        <input type="text" placeholder="Database table" name="db_table">
        <input type="submit" name="">
    </form>
</html>