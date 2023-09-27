    <?php require_once 'header.php';
        require_once 'connect.php';

        $id = $_GET['newpageid'];

        $sql = "SELECT * FROM topics WHERE project_id='$id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
    

        ?>

        <div class='container form-add-project mt-5 p-5'>
            <h1 class='is-h1 text-center'>Project info</h1>
            <form method='post'>
                <input type='text' class="form-control mt-2" name='project_name' value='<?php echo $row['project_title']; ?>'>
                <input type='text' class="form-control mt-2" name='project_desc' value='<?php echo $row['project_small_desc']; ?>'>
                <input type='text' class="form-control mt-2" name='project_content' value='<?php echo $row['project_content']; ?>'>
                <input type='text' class="form-control mt-2" name='project_manager' value='<?php echo $row['project_manager']; ?>'>
                <input type='text' class="form-control mt-2" name='project_status' value='<?php echo $row['project_status']; ?>'>
                <input type='text' class="form-control mt-2" name='project_category' value='<?php echo $row['project_category']; ?>' disabled>
                <input type='text' class="form-control mt-2" name='project_expenses' value='<?php echo $row['project_expenses']; ?>'>
                <input type='text' class="form-control mt-2" name='expected_yield' value='<?php echo $row['expected_yield']; ?>'>
                <input type='text' class="form-control mt-2" name='project_date_added' value='<?php echo $row['project_date']; ?>' disabled>
                <input type='submit' class="btn btn-primary mt-2" name='project_update' value='Update'>
            </form>
        </div>


        <?php
            }
        }
        else {
            echo "0 results";
        }   

        //mysqli_close($conn);

        if (isset($_POST['project_update'])) {
            $project_title = $_POST['project_name'];
            $project_small_desc = $_POST['project_desc'];
            $project_content = $_POST['project_content'];
            $project_manager = $_POST['project_manager'];
            $project_status = $_POST['project_status'];
            $project_expenses = $_POST['project_expenses'];
            $expected_yield = $_POST['expected_yield'];
        
            $sql = "UPDATE topics 
                SET project_title = '$project_title', project_small_desc = '$project_small_desc', project_content = '$project_content', project_manager = '$project_manager', project_status = '$project_status', project_expenses = '$project_expenses', expected_yield = '$expected_yield'  
                WHERE project_id = '$id'";
        
            if ($conn->query($sql) === TRUE) {
            echo "<div style='margin: 0 auto;width: 25%;' class='alert alert-primary text-center mt-3' role='alert'>
            Project updated succesfully
          </div>";
            //header('Location: settings.php');
            } else {
            echo "Error updating record: " . $conn->error;
            }
        
            $conn->close();
        }
        