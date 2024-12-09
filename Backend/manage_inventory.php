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
    <div class="dashboard-items" id="mi"><a href="add_categories.php">Add Categories</a></div>
        <div class="dashboard-items" id="mi"><a href="save_product.php">Add Product</a></div>
        <div class="dashboard-items" id="mu"><a href="view_products.php">View Product</a></div>
        <div class="dashboard-items" id="mo"><a href="update_products.php">Edit/Update Product</a></div>
        <div class="dashboard-items" id="rpt"><a href="delete_product.php">Delete Product</a></div>
    </div>
</body>
</html>