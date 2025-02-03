<?php 

    include 'connection.php';
    $get_the_id = $_GET['v'];

    $delete_data = "DELETE FROM `test-table` WHERE `id`='$get_the_id'";

    $exe_delete_query = mysqli_query($con,$delete_data);

    if ($exe_delete_query) {
        ?>
            <script>
                alert('data deleted successfully');
                location.replace('showdata.php');
            </script>
        <?php
    }else{
        ?>
            <script>
                alert('Something went wrong')
            </script>
        <?php
    }
?>