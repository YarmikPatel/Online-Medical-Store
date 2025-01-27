<?php
include('../../Backend/connection.php');
include('navbar.php');
if(isset($_GET['pid']))
{
    $pid=$_GET['pid'];
    echo "<script>alert('$pid');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Interface</title>
    <link rel="stylesheet" href="style.css">
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
    <script src="script.js"></script>
</body>
</html>
