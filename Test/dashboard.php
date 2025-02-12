<?php
session_start();
include("connect.php");

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: home.php");
    exit();
}

// Get user details from database
$username = $_SESSION["username"];
$query = "SELECT * FROM `userinfo` WHERE `username` = '$username'";
$result = mysqli_query($con, $query);
$userDetails = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f4f4f4;
        }

        /* Navbar Styles */
        .navbar {
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            padding: 1rem 2rem;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .navbar h1 {
            font-size: 1.5rem;
        }

        .navbar .user-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: rgba(255,255,255,0.1);
        }

        .logout-btn {
            background-color: rgba(255,255,255,0.2);
        }

        /* Dashboard Content */
        .dashboard-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .welcome-section {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .welcome-section h2 {
            color: #333;
            margin-bottom: 1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .stat-card h3 {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .stat-card .value {
            color: #333;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .user-info {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .user-info h2 {
            color: #333;
            margin-bottom: 1.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .info-item {
            margin-bottom: 1rem;
        }

        .info-item label {
            display: block;
            color: #666;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .info-item .value {
            color: #333;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <h1>Dashboard</h1>
        <div class="user-actions">
            <span>Welcome, <?php echo htmlspecialchars($userDetails["username"]); ?></span>
            <a href="#">Edit Profile</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="dashboard-container">
        <section class="welcome-section">
            <h2>Welcome Back, <?php echo htmlspecialchars($userDetails["name"]); ?>!</h2>
            <p>Here's your account overview</p>
        </section>

        <!-- Stats Section -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Account Status</h3>
                <div class="value">Active</div>
            </div>
            <div class="stat-card">
                <h3>Member Since</h3>
                <div class="value"><?php echo date("M Y"); ?></div>
            </div>
            <div class="stat-card">
                <h3>Last Login</h3>
                <div class="value"><?php echo date("d M Y"); ?></div>
            </div>
        </div>

        <!-- User Information -->
        <section class="user-info">
            <h2>Your Information</h2>
            <div class="info-grid">
                <div class="info-item">
                    <label>Full Name</label>
                    <div class="value"><?php echo htmlspecialchars($userDetails["name"]); ?></div>
                </div>
                <div class="info-item">
                    <label>Username</label>
                    <div class="value"><?php echo htmlspecialchars($userDetails["username"]); ?></div>
                </div>
                <div class="info-item">
                    <label>Email</label>
                    <div class="value"><?php echo htmlspecialchars($userDetails["email"]); ?></div>
                </div>
                <div class="info-item">
                    <label>Date of Birth</label>
                    <div class="value"><?php echo htmlspecialchars($userDetails["birthdate"]); ?></div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($con);
?>