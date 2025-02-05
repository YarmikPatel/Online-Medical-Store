<?php
// sidebar.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .sidenav {
            height: 100vh;
            width: 0;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #007bff;
            overflow-x: hidden;
            padding-top: 60px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            transition: 0.5s;
        }
        .sidenav a {
            padding: 12px 20px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            transition: 0.3s;
        }
        .sidenav a:hover {
            background: #28a745;
            color: white;
            border-radius: 5px;
        }
        .sidenav .closebtn {
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 36px;
            color: white;
            background: none;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <button class="closebtn" onclick="closeNav()">&times;</button>
        <a href="manage_inventory.php">Manage Inventory</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="manage_orders.php">Manage Orders</a>
        <a href="report.php">Report</a>
        <a href="admin_logout.php">Log Out</a>
    </div>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "260px";
            document.getElementById("main").style.marginLeft = "260px";
            document.getElementById("menuBtn").style.display = "none";
        }
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.getElementById("menuBtn").style.display = "block";
        }
    </script>
</body>
</html>
