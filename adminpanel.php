<?php 
session_start();
if ($_SESSION['isadmin'] != "1" ) {
    header("Location: index.php");
}

require_once 'header.php';