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
            <p>Degree:</p>
            <input type="text" name = "degree">
            <p>Board/University:</p>
            <input type="text" name = "Board-University">
            <p>Subject:</p>
            <input type="text" name = "subject">
            <p>Result:</p>
            <input type="text" name = "result"><br><br>
            <p>Year:</p>
            <input type="number" name = "year"><br><br>
            <button name ="btn">Submit </button>
        </form>
        <a href="showdata.php">Click here to see the data</a>
    </main>
</body>
</html>

<?php
    include "connect.php";
    if (isset($_POST["btn"])) {
        $degree = $_POST["degree"];
        $b_u = $_POST["Board-University"];
        $subject = $_POST["subject"];
        $result = $_POST["subject"];
        $year = $_POST["year"];

        $query_insert = "INSERT INTO `education`(`Degree`, `Board/University`, `Subject`, `Result`, `Year`) VALUES ('$degree','$b_u','$subject','$result','$year')";
        $query_exe = mysqli_query($con, $query_insert);
    }
?>
