<?php require_once 'header.php'; ?>

<html>
    <div>
        <form class="mt-3" method="post" style="width: 50%;margin:0 auto;">
            <input class="form-control mt-2" type="text" name="companyname" placeholder="Company" required>
            <div class="test">
                <input class="form-control mt-2" type="text" name="firstname" placeholder="Firstname" required>
                <input class="form-control mt-2" type="text" name="lastname" placeholder="Lastname" required>
            </div>
            <div class="test">
                <input class="form-control mt-2" type="email" name="email" placeholder="Email" required>
                <input class="form-control mt-2" type="password" name="password" placeholder="Password" required>
            </div>
            <input class="form-control mt-2 btn btn-primary" type="submit" name="submit">
        </form>
    </div>
</html>

<?php 

if (isset($_POST['submit'])) {
    // Form variables
    $companyname = $_POST['companyname'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $passwordform = $_POST['password'];
    $password_hashed = password_hash($passwordform, PASSWORD_DEFAULT);

    require_once 'connect.php';

    $sql = "INSERT INTO users (company_name, firstname, lastname, email, password)
VALUES ('$companyname', '$firstname', '$lastname', '$email', '$password_hashed')";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='margin: 0 auto;width: 25%;' class='alert alert-primary text-center mt-3' role='alert'>
  Account created successfully
</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}