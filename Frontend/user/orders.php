<?php
include('../../Backend/connection.php');
session_start();

// Fetch data from order_history table
$sql = "SELECT * FROM order_history";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            transition: filter 0.3s ease;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            margin: 0 0 10px;
            color: #007bff;
        }

        .card p {
            margin: 5px 0;
            color: #555;
        }

        .floating-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #007bff;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            border: none;
            z-index: 1000;
        }

        .floating-button:hover {
            background: #0056b3;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Order History</h1>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="card">
                    <h3>Order ID: <?= htmlspecialchars($row['oid']) ?></h3>
                    <p><strong>Order Date:</strong> <?= htmlspecialchars($row['order_date']) ?></p>
                    <p><strong>User ID:</strong> <?= htmlspecialchars($row['uid']) ?></p>
                    <p><strong>Product ID:</strong> <?= htmlspecialchars($row['pid']) ?></p>
                    <p><strong>Status:</strong> <?= htmlspecialchars($row['status']) ?></p>
                    <p><strong>Price:</strong> $<?= htmlspecialchars($row['price']) ?></p>
                    <p><strong>Quantity:</strong> <?= htmlspecialchars($row['qty']) ?></p>
                    <p><strong>Total Amount:</strong> $<?= htmlspecialchars($row['total_amount']) ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </div>

    <div class="overlay"></div>
    <button class="floating-button" onclick="alert('Floating button clicked!');">+</button>
</body>
</html>

<?php
$conn->close();
?>
