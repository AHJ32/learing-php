<?php session_start(); 

    if (!isset($_SESSION['username'])) {
        ?>
            <script>
                alert("You can not visit home page directly. You need to log in first");
                location.replace('index.php');
            </script>
        <?php
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #0056b3;
        }
        nav a {
            padding: 14px 20px;
            display: block;
            color: white;
            text-decoration: none;
            text-align: center;
        }
        nav a:hover {
            background-color: #004080;
        }
        .container {
            padding: 20px;
        }
        .welcome {
            text-align: center;
            margin: 20px 0;
        }
        .features {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .feature-box {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 30%;
        }
        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to the Home Page</h1>
        <h3><?php echo $_SESSION['username']; ?></h3>
    </header>
    <nav>
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        <a href="logout.php">LogOut</a>
    </nav>
    <div class="container">
        <div class="welcome">
            <h2>Hello, User!</h2>
            <p>Welcome to our amazing website. Here you'll find lots of interesting content and features!</p>
        </div>
        <div class="features">
            <div class="feature-box">
                <h3>Feature 1</h3>
                <p>Description of the first feature.</p>
            </div>
            <div class="feature-box">
                <h3>Feature 2</h3>
                <p>Description of the second feature.</p>
            </div>
            <div class="feature-box">
                <h3>Feature 3</h3>
                <p>Description of the third feature.</p>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Your Website. All rights reserved.</p>
    </footer>
</body>
</html>
