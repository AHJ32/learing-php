<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .login-container input {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="pass" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <br><br>
        Don't have an account? <a href="signup.php">Create one</a>
    </div>
</body>

</html>

<?php 
    include 'connection.php';

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $isAccountExists = "SELECT * FROM `userinfo` WHERE `email` = '$email'";
        $exe_isAccountExists = mysqli_query($con, $isAccountExists);
        $findResult = mysqli_num_rows($exe_isAccountExists);
        if ($findResult > 0) {
            $userInfo = mysqli_fetch_array($exe_isAccountExists);
            $db_pass = $userInfo['password'];
            $check_pass_valid = password_verify($pass,$db_pass);
            if ($check_pass_valid) {
                $_SESSION['username'] = $userInfo['username'];
                ?>
                <script>
                    alert('Login successfull!');
                    location.replace('home.php');
                </script>
            <?php
            }else{
                ?>
                <script>
                    alert('Invalid email or password');
                </script>
            <?php
            }
        }else{
            ?>
                <script>
                    alert('Invalid info');
                </script>
            <?php
        }
    }

?>