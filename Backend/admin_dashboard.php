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
    <title>Admin Dashboard</title>
</head>
<body>
<div class="sidebar">
    <div class="logo">MedPlus</div>
    <a href="manage_inventory.php" class="active">Manage Inventory</a>
    <a href="manage_users.php">Manage Users</a>
    <a href="manage_orders.php">Manage Orders</a>
    <a href="report.php">Report</a>
    <a href="admin_logout.php">Log Out</a>
</div>
<div class="main-content">
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
