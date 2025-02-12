<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            padding: 20px;
        }

        .container {
            max-width: 500px;
            width: 100%;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .title {
            font-size: 25px;
            font-weight: 500;
            margin-bottom: 25px;
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #9b59b6;
            outline: none;
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        button:hover {
            transform: translateY(-2px);
        }

        @media (max-width: 450px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="title">Create Account</h1>
        <form method="POST">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" required placeholder="Enter your full name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required placeholder="Choose a username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Enter your password">
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="confirm-password" id="confirm-password" required placeholder="Confirm your password">
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" required>
            </div>

            <button type="submit" name="btn">Sign Up</button>
        </form>
    </div>
</body>

</html>

<?php
include("connect.php");

if (isset($_POST["btn"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];
    $dob = $_POST["dob"];


    //Check if email already exists
    $check_already_has_email = "SELECT * FROM `userinfo` WHERE `email` = '$email'";
    $exe_check_already_has_email = mysqli_query($con, $check_already_has_email);

    $check_row_count = mysqli_num_rows($exe_check_already_has_email);

    if ($check_row_count > 0) { //if $check_row_count is greater than 0. That means email already exists
        ?>
        <script>
            alert("Email already exists");
        </script>
        <?php
    } else {
        //check if password and confirm password match
        if ($password != $confirmPassword) {
            ?>
            <script>
                alert("Passwords do not match");
            </script>
            <?php
        } else {
            $encrypting = password_hash($password, PASSWORD_BCRYPT);// This will encrypt the password
            $account_Creation_query = "INSERT INTO `userinfo`(`name`, `email`, `username`, `password`, `birthdate`) VALUES ('$name','$email','$username','$encrypting ','$dob')"; //This is a query to insert data into the database
            $exe_account_Creation = mysqli_query($con, $account_Creation_query);

            if ($exe_account_Creation) {
                ?>
                <script>
                    alert("Account created successfully");
                    location.replace("home.php");
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Account creation failed. Try again");
                    
                </script>
                <?php
            }

        }

    }
}
?>