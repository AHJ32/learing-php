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
            <p>Name:</p>
            <input type="text" name = "name">
            <p>Roll:</p>
            <input type="number" name = "roll">
            <p>Reg. No:</p>
            <input type="number" name = "reg">
            <p>Email:</p>
            <input type="text" name = "email"><br><br>
            <button name ="btn">Submit </button>
        </form>
        <a href="showdata.php">Click here to see all data</a>
    </main>
</body>
</html>

<?php
    include "connection.php";
    if (isset($_POST["btn"])) {
        $name = $_POST["name"];
        $roll = $_POST["roll"];
        $reg = $_POST["reg"];
        $email = $_POST["email"];

        $query_insertion = "INSERT INTO `student_info`(`Name`, `Roll`, `Reg`, `Email`) VALUES ('$name','$roll','$reg','$email')";
        $exe = mysqli_query($con, $query_insertion);
    }
?>
