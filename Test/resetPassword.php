<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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

        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .error {
            background: #ffe6e6;
            color: #ff0000;
        }

        .success {
            background: #e6ffe6;
            color: #008000;
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
    </style>
</head>

<body>
    <div class="container">
        <h1 class="title">Reset Password</h1>
        <form method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" name="email" required placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" name="newPass" id="new_password" name="new_password" required
                    placeholder="Enter new password">
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" name="newCPass" id="confirm_password" name="confirm_password" required
                    placeholder="Confirm new password">
            </div>

            <button type="submit" name="btn">Reset Password</button>

            <div class="links">
                <a href="home.php">Back to Login</a>
            </div>
        </form>
    </div>
</body>

</html>

<?php
include("connect.php");
if (isset($_POST["btn"])) {
    $email = $_POST["email"];
    $newPass = $_POST["newPass"];
    $newCPass = $_POST["newCPass"];

    $checkAccount = "SELECT * FROM `userinfo` WHERE `email` = '$email'";
    $exe_checkAccount = mysqli_query($con, $checkAccount);
    $accountExists = mysqli_num_rows($exe_checkAccount);

    if ($accountExists > 0) {
        if ($newPass != $newCPass) {
            ?>
            <script>
                alert("Passwords do not match");
            </script>
            <?php
        } else {
            $hashedPass = password_hash($newPass, PASSWORD_BCRYPT);

            // Update password in database
            $updatePass = "UPDATE `userinfo` SET `password` = '$hashedPass' WHERE `email` = '$email'";
            $exe_updatePass = mysqli_query($con, $updatePass);

            if ($exe_updatePass) {
                ?>
                <script>
                    alert("Password reset successful");
                    location.replace("home.php");
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Password reset failed. Please try again");
                </script>
                <?php
            }
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