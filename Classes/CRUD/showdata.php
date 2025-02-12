<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show All Data</title>
    <style>
        table {
            margin: auto auto;
            border-collapse: collapse
        }
    </style>
</head>

<body>
    <table border="2">
        <thead>
            <th>Name</th>
            <th>Roll</th>
            <th>Reg</th>
            <th>Email</th>
        </thead>
        <tbody>
            <?php
            include 'Connection.php';

            $search = "SELECT * FROM `student_info`";
            $search_exe = mysqli_query($con, $search);

            while ($res = mysqli_fetch_array($search_exe)) {
                ?>
                <tr>
                    <td><?php echo $res['Name'] ?></td>
                    <td><?php echo $res['Roll'] ?></td>
                    <td><?php echo $res['Reg'] ?></td>
                    <td><?php echo $res['Email'] ?></td>
                </tr>
                <?php
            }

            ?>
        </tbody>
    </table>
</body>

</html>