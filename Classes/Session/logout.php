
<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        ?>
            <script>
                alert("You need to log in first");
                location.replace('index.php');
            </script>
        <?php
        die();
    }
    session_destroy();
?>

<script>
    alert('Logout successfull');
    location.replace('index.php');
</script>