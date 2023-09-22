<?php 
require_once 'header.php';
require_once 'connect.php';

echo $_SESSION['account_id'];

$account_id = $_SESSION['account_id'];

$sql = "SELECT * FROM users WHERE id='$account_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>

<html>
    <div class="container form-add-project mt-5 p-5">
        <h1 style="text-align: center;">Profiel gegevens</h1>
        <form class="mt-3" method="post" style="width: 50%;margin:0 auto;">
            <input type="text" class="form-control mt-2" name="settings_name" placeholder="Naam" value="<?php echo $row['firstname'];?>">
            <input type="text" class="form-control mt-2" name="settings_lastname" placeholder="Achternaam" value="<?php echo $row['lastname'];?>">
            <input type="text" class="form-control mt-2" name="settings_email" placeholder="Email" value="<?php echo $row['email'];?>">
            <!-- <input type="text" class="form-control mt-2" name="settings_bedrijf" placeholder="Bedrijf" value="<?php echo $row['company_name'];?>"> -->
            <input type="submit" class="form-control mt-2 btn btn-primary" name="settings_update" value="Update">
        </form>
    </div>
</html>

<?php
  }
} else {
  echo "0 results";
}

if (isset($_POST['settings_update'])) {
    $settings_name = $_POST['settings_name'];
    $settings_lastname = $_POST['settings_lastname'];
    $settings_email = $_POST['settings_email'];
    // $settings_bedrijf = $_POST['settings_bedrijf'];

    $sql = "UPDATE users 
        SET firstname = '$settings_name', lastname = '$settings_lastname', email = '$settings_email' 
        WHERE id = '$account_id'";

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header('Location: settings.php');
    echo "done";
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}


