<?php
session_start();
if(!isset($_SESSION['uid'])){
    die('user not logged in. UID not found in session');
}
include('../../Backend/connection.php');
include 'navbar.php';
/*if(isset($_GET['pid']))
{
    $pid=$_GET['pid'];
    echo "<script>alert('$pid');</script>";
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Interface</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .card {
        max-width: 600px;
        background: transparent;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-content {
        padding: 15px;
        text-align: left;
    }

    .product-name {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .price {
        font-size: 16px;
        font-weight: bold;
        color: #00b894;
        margin-bottom: 10px;
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment Interface</h1>
        <form action="address.php" method="POST">
            <div class="payment-method">
                <label>
                    <input type="radio" name="payment_method" value="card">
                    Pay with Card
                </label>
                <div class="card-details">
                    <input type="text" name="card_number" placeholder="Card Number" pattern="\d{16}">
                    <input type="text" name="card_holder" placeholder="Card Holder Name">
                    <input type="month" name="expiry_date" placeholder="Expiry Date">
                    <input type="text" name="cvv" placeholder="CVV" pattern="\d{3}">
                </div>
            </div>
            <label>
                <input type="radio" name="payment_method" value="cash">
                Cash on Delivery
            </label>
            <a href="address.php"><button type="submit">Continue</button></a>
        </form>
    </div>
    <div class="container">
        <?php
            if(isset($_GET['pid']))
            {
                $pid=$_GET['pid'];
                // echo "<script>alert('$pid');</script>";

                $sql = "SELECT pid, pname, image, price, qty, final_order FROM cart WHERE pid=$pid";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                echo '<a href="product_details.php?pid=' . $row['pid'] . '" style="text-decoration: none; color: inherit;">';
                    echo '<div class="card">';
                        echo '<img src="../../Backend/image1/' . $row['image'] . '" alt="Product Image">';
                        echo '<div class="card-content">';
                            echo '<div class="product-name"><strong>Medicine:</strong>' . $row['pname'] . '</div>';
                            echo '<div class="price"><strong>Price:</strong>₹' . $row['price'] . '</div>';
                            echo '<div class="price"><strong>Quantity:</strong>' . $row['qty'] . '</div>';
                            echo '<div class="price"><strong>SubTotal:</strong>' . $row['final_order'] . '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '</a>';

            }
        ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
