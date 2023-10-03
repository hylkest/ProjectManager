<?php require_once "header.php"; ?>
<?php session_start(); ?>
<html>
    <div class="container form-add-project mt-5 p-5">
        <h1 class="is-h1 text-center">Log in</h1>
        <form class="mt-3" method="post" style="width: 50%;margin:0 auto;">
            <input class="form-control mt-2" type="email" placeholder="Email" name="emaillogin" >
            <input class="form-control mt-2" type="password" placeholder="Password" name="passwordlogin" >
            <input class="form-control mt-2 btn btn-primary" type="submit" name="login">
            <a href="register.php" style="text-align: center;">No account?</a>
        </form>
    </div>
</html>

<?php 

if (isset($_POST['login'])) {
    $emaillogin = $_POST['emaillogin'];
    $passwordlogin = ($_POST['passwordlogin']);

    require_once 'connect.php';

    $sql = "SELECT * FROM users WHERE email='$emaillogin'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        if ($emaillogin === $row['email'] && password_verify($passwordlogin, $row['password'])) {
            $_SESSION['account_id'] = $row["id"];
            $_SESSION['loggedin'] = "1";
            $_SESSION['isadmin'] = $row['is_admin'];
            echo $_SESSION['loggedin'];
            echo '<br>'.$_SESSION['isadmin'];
            header("Location: index.php");
        } else {
            echo "error";
        }
    }
    } else {
        echo "<div class='alert alert-danger' role='alert' style='width: 15%;
        text-align: center;
        margin: 0 auto;
        margin-top: 10px;'>
        ERROR: Login invalid
      </div>";
    //echo $sql;
    }
    $conn->close();
}

?>