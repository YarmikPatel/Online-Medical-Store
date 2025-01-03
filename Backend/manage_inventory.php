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
    <title></title>
</head>
<body>
<div class="nav-bar">
            <ul class="menu">
                    <li><a href="#">MedPlus</a></li>
                    <li><a href="admin_logout.php">Log out</a></li>
            </ul>
    </div>
    <div class="dash-text">
        <p>Manage Inventory</p>
    </div>
    <div class="main">
        <div class="dashboard-items" id="ac"><a href="add_categories.php">Add Categories</a></div>
        <div class="dashboard-items" id="sp"><a href="save_product.php">Add Product</a></div>
        <div class="dashboard-items" id="uc"><a href="update_category.php">Update Categories</a></div>
        <div class="dashboard-items" id="up"><a href="update_products.php">Edit/Update Product</a></div>
        <div class="dashboard-items" id="sp"><a href="delete_category.php">Delete Categories</a></div>
        <div class="dashboard-items" id="dp"><a href="delete_product.php">Delete Product</a></div>
    </div>
</body>
</html>