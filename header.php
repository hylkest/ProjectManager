<?php
session_start();
if ($_SESSION['isadmin'] === "1" ) {
    echo "<h3>Admin User</h3>";
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link href="/test/style.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg bg-body-color">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Projects</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/test/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/test/list.php">List</a>
                </li>
                <?php

                if ($_SESSION['isadmin'] === "1" ) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='/test/adminpanel.php'>Admin</a>
                </li>";
                }

                if ($_SESSION['loggedin'] === "1" ) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='/test/logout.php'>Logout</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='/test/login.php'>Log in</a>
                </li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>