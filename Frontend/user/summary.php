<?php
    include('../../Backend/connection.php');
    include('navbar.php');
    $payment_method = $_POST['payment_method'] ?? '';
    $address = $_POST['address'] ?? '';
    $temp_address = $_POST['temp_address'] ?? '';

    $final_address = $temp_address ? $temp_address : $address;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Order Summary</h1>
        <p><strong>Payment Method:</strong> <?= htmlspecialchars($payment_method); ?></p>
        <p><strong>Delivery Address:</strong> <?= htmlspecialchars($final_address); ?></p>
        <h2>Order Details:</h2>
        <ul>
            <li>Item 1: $20</li>
            <li>Item 2: $15</li>
            <li>Item 3: $10</li>
        </ul>
        <p><strong>Total:</strong> $45</p>
        <button onclick="alert('Order placed successfully!')">Place Order</button>
    </div>
</body>
</html>
