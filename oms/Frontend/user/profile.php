<?php
include('../../Backend/connection.php');

if (!isset($_GET['uid'])) {
    header('location:../login.php');
    die("User ID not provided.");
}

$uid = intval($_GET['uid']);

// Fetch user details
$sql = "SELECT uname, full_name, mobile, email_id, address FROM registration WHERE uid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $uid);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Fetch cart details
$sql = "SELECT pname, image, price, qty FROM cart WHERE uid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $uid);
$stmt->execute();
$cart = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Fetch order history
$sql = "SELECT pid, order_date, status, total_amount FROM order_history WHERE uid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $uid);
$stmt->execute();
$orders = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Fetch payment details
$sql = "SELECT 'oid', 'amount', 'payment_type' FROM payment WHERE uid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $uid);
$stmt->execute();
$payments = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section p, .section img {
            margin-bottom: 10px;
        }
        .section img {
            max-width: 100px;
            border-radius: 5px;
        }
        hr {
            border: 0;
            height: 1px;
            background: #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Profile</h2>
        <?php if ($user): ?>
            <div class="section">
                <p><strong>Username:</strong> <?php echo htmlspecialchars($user['uname']); ?></p>
                <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['full_name']); ?></p>
                <p><strong>Mobile:</strong> <?php echo htmlspecialchars($user['mobile']); ?></p>
                <p><strong>Email ID:</strong> <?php echo htmlspecialchars($user['email_id']); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
            </div>
        <?php else: ?>
            <p>User not found.</p>
        <?php endif; ?>

        <h2>Cart Items</h2>
        <?php foreach ($cart as $item): ?>
            <div class="section">
                <p><strong>Product Name:</strong> <?php echo htmlspecialchars($item['pname']); ?></p>
                <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="Product Image">
                <p><strong>Price:</strong> <?php echo htmlspecialchars($item['price']); ?></p>
                <p><strong>Quantity:</strong> <?php echo htmlspecialchars($item['qty']); ?></p>
            </div>
            <hr>
        <?php endforeach; ?>

        <h2>Order History</h2>
        <?php foreach ($orders as $order): ?>
            <div class="section">
                <p><strong>Product ID:</strong> <?php echo htmlspecialchars($order['pid']); ?></p>
                <p><strong>Order Date:</strong> <?php echo htmlspecialchars($order['order_date']); ?></p>
                <p><strong>Status:</strong> <?php echo htmlspecialchars($order['status']); ?></p>
                <p><strong>Total Amount:</strong> <?php echo htmlspecialchars($order['total_amount']); ?></p>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>
</body>
</html>
