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
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            line-height: 1.6;
        }

        .menu {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
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

        .card {
            width: 300px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: 290px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .card-content {
            padding: 10px;
        }

        .category {
            background-color: #17a2b8;
            color: #ffffff;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 5px;
        }

        .product-description {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .price {
            font-size: 16px;
            font-weight: bold;
            color: #28a745;
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
            width: 50%;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        /* .button:hover {
            background-color: #45a049;
        } */

        ::-webkit-scrollbar {
            display: none;
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


    <div class="menu">
    <?php
            $sql = "SELECT p.pid, p.pname, p.descript, p.illeness, p.dosage_schedule, p.price, p.image, c.name FROM product p INNER JOIN category c ON p.category_id = c.category_id";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<a href="product_details.php?pid=' . $row['pid'] . '" style="text-decoration: none; color: inherit;">';
                    echo '<div class="card">';
                    echo '<img src="../Backend/image1/' . $row['image'] . '" alt="Product Image">';
                    echo '<div class="card-content">';
                    echo '<div class="category">' . $row['name'] . '</div>';
                    echo '<div class="product-name"><strong>Medicine:</strong>' . $row['pname'] . '</div>';
                    echo '<div class="product-description"><strong>Description:</strong>' . $row['descript'] . '</div>';
                    echo '<div class="price">₹' . $row['price'] . '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo'</a>';
                }
            } else {
                echo '<p>No products found.</p>';
            }
        ?>
    </div>
</body>
</html>
