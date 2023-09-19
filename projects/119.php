
    <?php require_once '../header.php';
        require_once '../connect.php';
        
    ?>
    <div class='container'>
    
        <?php
         = 'SELECT id, firstname, lastname FROM MyGuests';
         = mysqli_query(, );
        
        if (mysqli_num_rows() > 0) {
          // output data of each row
          while( = mysqli_fetch_assoc()) {
            echo 'id: ' . . ' - Name: ' . . ' ' . . '<br>';
          }
        } else {
          echo '0 results';
        }
        
        mysqli_close();
     ?>
    </div>
    