<?php
include('../Backend/connection.php');
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
        margin: 0px;
    }

    .main-product{
        padding: 10px;
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
        font-weight: bold;
    }

    img {
            width: 300px;
            height: 290px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .category {
            color: #17a2b8;
            /* color: #ffffff; */
            font-size: 20px;
            /* padding: 5px 10px; */
            /* border-radius: 20px; */
            /* display: inline-block; */
            margin-bottom: 10px;
        }

        .product-name {
            font-size: 30px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 5px;
        }

        .product-description {
            font-size: 27px;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color:rgb(40, 131, 167);
            margin-bottom: 10px;
        }

        .button {
            display: block;
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            margin: 15px auto 0;
            width: 80%;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
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
    
    <div class="main-product">
    <?php
        // Get the product ID from the URL
        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];

            // Fetch product details from the database
            $sql = "SELECT p.pname, p.descript, p.price, p.image, c.name, p.illeness, p.dosage_schedule, p.stock
            FROM product p 
            INNER JOIN category c ON p.category_id = c.category_id 
            WHERE p.pid = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $pid);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $row = $result->fetch_assoc()) {
            // Display product details
            echo '<h1>' . $row['pname'] . '</h1>';
            echo '<img src="../Backend/image1/' . $row['image'] . '" alt="Product Image">';
            echo '<p class="product-name category"><strong>Category:</strong> ' . $row['name'] . '</p>';
            echo '<p class="product-name"><strong>Description:</strong> ' . $row['descript'] . '</p>';
            echo '<div class="product-name"><strong>Illness:</strong> ' . $row['illeness'] . '</div>';
            echo '<div class="product-name"><strong>Dosage Schedule:</strong> ' . $row['dosage_schedule'] . '</div>';
            echo '<p class="price"><strong>Price:</strong> ₹' . $row['price'] . '</p>';
            echo '<p><strong>Stock:</strong>' . $row['stock'] . '</p>';
            echo '<a href="add_cart.php" class="button">Add to cart</a>';
            } else {
                echo '<p>Product not found.</p>';
            }
        } else {
            echo '<p>No product selected.</p>';
        }
    ?>
    </div>
    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>
</html>