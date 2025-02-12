<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            max-width: 400px;
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
            margin-bottom: 15px;
        }

        button:hover {
            transform: translateY(-2px);
        }

        .links {
            text-align: center;
        }

        .links a {
            color: #9b59b6;
            text-decoration: none;
            font-size: 14px;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .divider {
            margin: 0 10px;
            color: #666;
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
        <h1 class="title">Welcome Back</h1>
        <form method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Enter your password">
            </div>

            <button type="submit" name="btn">Login</button>

            <div class="links">
                <a href="resetPassword.php">Forgot Password?</a>
                <span class="divider">|</span>
                <a href="signup.php">Create Account</a>
            </div>
        </form>
    </div>
</body>

</html>

<?php
include "connect.php";

if (isset($_POST["btn"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $doesAccExist = "SELECT * FROM `userinfo` WHERE `email` = '$email'";
    $exe_doesAccExist = mysqli_query($con, $doesAccExist);
    $result = mysqli_num_rows($exe_doesAccExist);

    if ($result > 0) {
        $details = mysqli_fetch_array($exe_doesAccExist);
        $dbPass = $details["password"];
        $checkPassValidity = password_verify($password, $dbPass);
        if ($checkPassValidity) {
            $_SESSION["username"] = $details["username"];
            ?>
            <script>
                alert("Login Successfull");
                location.replace("dashboard.php");
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Incorrect Password");
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("Account does not exist");
        </script>
        <?php
    }

}
?>