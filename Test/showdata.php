<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show All Data</title>
    <style>
        table {
            margin: auto auto;
            padding: auto auto;
            border-collapse: collapse
        }
    </style>
</head>

<body>
    <table border="2">
        <thead>
            <th>Degree</th>
            <th>Board/University</th>
            <th>Subject</th>
            <th>Result</th>
            <th>Year</th>
        </thead>
        <tbody>
            <?php
            include 'Connect.php';

            $search = "SELECT * FROM `education`";
            $search_exe = mysqli_query($con, $search);

            while ($fetch = mysqli_fetch_array($search_exe)) {
                ?>
                <tr>
                    <td><?php echo $fetch['Degree'] ?></td>
                    <td><?php echo $fetch['Board/University'] ?></td>
                    <td><?php echo $fetch['Subject'] ?></td>
                    <td><?php echo $fetch['Result'] ?></td>
                    <td><?php echo $fetch['Year'] ?></td>
                </tr>
                <?php
            }

            ?>
        </tbody>
    </table>
</body>

</html>