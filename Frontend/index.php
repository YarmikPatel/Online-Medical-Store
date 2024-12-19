<?php
include('../Backend/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Index Without Login</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Navbar Styling */
        .navbar-menu {
            background-color: #2d3e50;
            overflow: hidden;
            padding: 10px 0;
        }

        .navbar-menu ul {
            list-style-type: none;
            margin: 20px,40px;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .navbar-menu ul li {
            margin: 0 15px;
        }

        .navbar-menu ul li a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .navbar-menu ul li a:hover {
            background-color: #4CAF50;
            border-radius: 5px;
        }

        .navbar-menu ul li a.index {
            background-color: #4CAF50;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar-menu">
        <ul>
            <li><a href="index.php" class="index">Home</a></li>
            <li><a href="lab_test.php">Lab Test</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="order_history.php">Order History</a></li>
            <li><a href="prescription.php">Prescription</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>
</body>
</html>
