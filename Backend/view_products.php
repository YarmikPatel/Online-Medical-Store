<?php
// include('admin_session.php');
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_dashboard.css">
    <title>Admin - View Products</title>
</head>
<body>
<div class="nav-bar">
            <ul class="menu">
                    <li><a href="#">MedPlus</a></li>
                    <li><a href="view_categories.php">Categories</a></li>
                    <li><a href="view_products_list.php">Products</a></li>
                    <li><a href="admin_logout.php">Log out</a></li>
            </ul>
    </div>
    <div class="main">
        <div class="content" id="content">
            <h1>Select categories to view categories of products or select products to view list of products</h1>
        </div>
    </div>
</body>
</html>