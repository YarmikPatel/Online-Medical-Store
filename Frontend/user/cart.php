<?php
session_start();
if (!isset($_SESSION['uid'])) {
    die('User not logged in. UID not found in session.');
}
$uid = $_SESSION['uid'];
include('../../Backend/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        /* Navbar Styling */
        .navbar {
            position: sticky;
            top: 0;
            /* left: 0; */
            width: 100%;
            background-color: #2c3e50;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            z-index: 1000;
            transition: background-color 0.3s ease;
        }

        .navbar .logo {
            color: #ecf0f1;
            font-size: 26px;
            font-weight: bold;
            text-decoration: none;
            letter-spacing: 1px;
        }

        /* Menu Items */
        .navbar ul {
            list-style: none;
            display: flex;
            align-items: center;
        }

        .navbar ul li {
            margin-left: 30px;
        }

        .navbar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 18px;
            position: relative;
            transition: color 0.3s ease;
        }

        .navbar ul li a:hover {
            color: #1abc9c;
        }

        .navbar ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: #1abc9c;
            left: 0;
            bottom: -5px;
            transition: width 0.3s ease;
        }

        .navbar ul li a:hover::after {
            width: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="logo">MediStore</a>
        <span class="menu-toggle">&#9776;</span>
        <ul>
            <li><a href="user_login_index.php">HOME</a></li>
            <li><a href="lab_test.php">Lab Test</a></li>
            <li><a href="cart.php"> My Cart</a></li>
            <li><a href="orders.php">My Orders</a></li>
            <li><a href="prescription.php">Priscription</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <?php
        $uid = $_SESSION['uid']; // Replace with session user ID
        $sql = "SELECT p.pname, p.price, c.qty 
                FROM cart c 
                INNER JOIN product p ON c.pid = p.pid 
                WHERE c.uid = $uid";
        $result = mysqli_query($conn, $sql);
        if($result){
            if(mysqli_num_rows($result) > 0 ){
                while ($row = $result->fetch_assoc()) {
                    echo '<div>';
                        echo '<p><strong>Product:</strong> ' . $row['pname'] . '</p>';
                        echo '<p><strong>Price:</strong> ₹' . $row['price'] . '</p>';
                        echo '<p><strong>Quantity:</strong> ' . $row['qty'] . '</p>';
                        echo '<hr>';
                        echo '</div>';
                }
            }else{
                echo "Your cart is empty";
            }
        }else{
            echo "Server error";
        }
    ?>
</body>
</html>