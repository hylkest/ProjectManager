<?php require_once "header.php"; 
session_start();
if ($_SESSION['loggedin'] != "1" ) {
    header("Location: index.php");
}

$_SESSION['loggedin'] = "0";
$_SESSION['isadmin'] = "0";
header("Location: login.php");