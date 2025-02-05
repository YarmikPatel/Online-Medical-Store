<?php
include('admin_session.php');
include('connection.php');
include('menu.php');  // Import sidebar.php here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_dashboard.css">
    <style>
        body {
            font-family: "Lato", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
            display: flex;
        }
        .main-content {
            margin-left: 0;
            flex-grow: 1;
            padding: 20px;
            transition: margin-left 0.5s;
        }
        .menu-btn {
            font-size: 30px;
            cursor: pointer;
            color: #007bff;
            display: block;
            position: absolute;
            top: 15px;
            left: 15px;
        }
        .welcm {
            margin-left: 50px; /* Adds space between toggle button and Hi Admin message */
        }
        .dashboard-items {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .dashboard-card {
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            flex: 1;
        }
        .dashboard-card a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <span id="menuBtn" class="menu-btn" onclick="openNav()">&#9776;</span>
    <div class="main-content" id="main">
        <div class="welcm">
            <p id="wlcm_admin">Hi Admin, <?php echo $_SESSION['admin_name']; ?></p>
        </div>
        <div class="dash-text" id="dash-text">Dashboard</div>
        <div class="dashboard-items">
            <div class="dashboard-card"><a href="manage_inventory.php">Manage Inventory</a></div>
            <div class="dashboard-card"><a href="manage_users.php">Manage Users</a></div>
            <div class="dashboard-card"><a href="manage_orders.php">Manage Orders</a></div>
            <div class="dashboard-card"><a href="report.php">Report</a></div>
        </div>
    </div>
</body>
</html>
