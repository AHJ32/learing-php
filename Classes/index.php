<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Insertion</title>
</head>
<body>
    <main>
        <form method="POST">
            <p>Roll:</p>
            <input type="number" name = "roll">
            <p>Reg. No:</p>
            <input type="number" name = "reg">
            <p>Email:</p>
            <input type="text" name = "email"><br><br>
            <button name ="btn">Submit </button>
        </form>
        <a href="">Click here to see all data</a>
    </main>
</body>
</html>

<?php
    include "connection.php";
    if (isset($_POST["btn"])) {
        $roll = $_POST["roll"];
        $reg = $_POST["reg"];
        $email = $_POST["email"];

        $query_insertion = "INSERT INTO `details`(`Roll`, `Reg`, `Email`) VALUES ('$roll','$reg','$email')";
        $exe = mysqli_query($con, $query_insertion);
    }
?>
