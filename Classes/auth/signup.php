<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .signup-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .signup-container h2 {
            margin-bottom: 20px;
        }

        .signup-container input {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .signup-container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: white;
            font-size: 16px;
        }

        .signup-container button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="signup-container">
        <h2>Signup</h2>
        <form method="POST">
            <input name="name" type="text" placeholder="Name" required>
            <input name="email" type="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="pass" placeholder="Password" required>
            <input type="password" name="cpass" placeholder="Confirm Password" required>
            <input type="date" name="bday" placeholder="Birthday" required>
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <button type="submit" name="submit">Signup</button>
        </form>
        <br> <br>
        Already have an account? <a href="index.php">Log in now!</a>
    </div>
</body>
</html>

<?php 
    include 'connection.php';

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $bday = $_POST['bday'];
        $phone = $_POST['phone'];

        $check_already_has_account = "SELECT * FROM `userinfo` WHERE `email` = '$email'";
        $exe_check_already_has_account = mysqli_query($con, $check_already_has_account);

        $check_row_count = mysqli_num_rows($exe_check_already_has_account);
        //checking that user already exist or not to let him create an account
        if ($check_row_count > 0) {
            ?>
                <script>
                    alert("Account already exist with this information");
                </script>
            <?php
        }else{
            //checking pass and cpass values are qqual
            if ($pass != $cpass) {
                ?>
                <script>
                    alert("Enter the same value for Password and Confirm Password field");
                </script>
            <?php
            }else{
                //all info are ok to create an account.
                //First encryption of password
                $encrypt_pass = password_hash($pass, PASSWORD_BCRYPT);

                $creating_account_quary = "INSERT INTO `userinfo`(`name`, `email`, `username`, `password`, `birthdate`, `phone`) VALUES ('$name','$email','$username','$encrypt_pass','$bday','$phone')";

                $exe_creating_account = mysqli_query($con,$creating_account_quary);

                if ($exe_creating_account) {
                    ?>
                <script>
                    alert("Account Created Successfully");
                </script>
            <?php
                }else{
                    ?>
                <script>
                    alert("Something went wrong, please try again");
                </script>
            <?php
                }
            }
        }
    }

?>