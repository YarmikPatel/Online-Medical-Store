<?php
     include('admin_session.php');
    include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_dashboard.css">
    <title>Admin - Dashboard</title>
</head>
<body>
    <div class="nav-bar">
            <ul class="menu">
                    <li><a href="#">MedPlus</a></li>
                    <li><a href="admin_logout.php">Log out</a></li>
            </ul>
    </div>
    <div class="welcm">
        <p>
            <?php 
                // Admin specific content
                 echo "<br>Hi admin, " . $_SESSION['admin_name'];
                
            ?>
        </p>
    </div>
    <div class="dash-text">
        <p>Dashboard</p>
    </div>
    <div class="main">
        <div class="dashboard-items" id="mi"><a href="manage_inventory.php">Manage Inventory</a></div>
        <div class="dashboard-items" id="mu"><a href="manage_users.php">Manage Users</a></div>
        <div class="dashboard-items" id="mo"><a href="manage_orders.php">Manage Orders</a></div>
        <div class="dashboard-items" id="rpt"><a href="report.php">Report</a></div>
    </div>
</body>
</html>