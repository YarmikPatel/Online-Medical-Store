<?php
include('../Backend/connection.php');


// Get the product ID from the URL
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details from the database
    $sql = "SELECT p.pname, p.descript, p.price, p.image, c.name 
            FROM product p 
            INNER JOIN category c ON p.category_id = c.category_id 
            WHERE p.pid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $row = $result->fetch_assoc()) {
        // Display product details
        echo '<h1>' . $row['pname'] . '</h1>';
        echo '<img src="../Backend/image1/' . $row['image'] . '" alt="Product Image">';
        echo '<p><strong>Category:</strong> ' . $row['name'] . '</p>';
        echo '<p><strong>Description:</strong> ' . $row['descript'] . '</p>';
        echo '<p><strong>Price:</strong> ₹' . $row['price'] . '</p>';
    } else {
        echo '<p>Product not found.</p>';
    }
} else {
    echo '<p>No product selected.</p>';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 20px;
        padding: 0;
    }
    h1 {
        font-size: 24px;
        color: #343a40;
    }
    img {
        max-width: 100%;
        height: auto;
        border: 1px solid #ddd;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    p {
        font-size: 16px;
        margin: 10px 0;
        color: #6c757d;
    }

    /* Navbar Styling */
    .navbar-menu {
            background-color: #1e2a38;
            padding: 10px 20px;
            color: white;
        }

        .navbar-menu ul {
            list-style: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-menu ul li {
            margin: 0 10px;
        }

        .navbar-menu ul li a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 8px 15px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar-menu ul li a:hover {
            background-color: #4CAF50;
            border-radius: 5px;
            color: #ffffff;
        }

        .navbar-menu ul li a.index {
            background-color: #4CAF50;
            border-radius: 5px;
            color: #ffffff;
        }
</style>
</head>
<body>
<div class="navbar-menu">
        <ul>
            <li><a href="index.php" class="index">Home</a></li>
            <li><a href="lab_test.php">Lab Test</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="order_history.php">Order History</a></li>
            <li><a href="\user\prescription.php">Prescription</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>  
</body>
</html>