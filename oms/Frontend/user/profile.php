<?php
session_start();
include('../../Backend/connection.php');
include'navbar.php';

// Redirect if not logged in
if (!isset($_SESSION['uid'])) {
    header('location:../login.php');
    exit;
}

$uid = $_SESSION['uid'];

// Fetch user details
function fetchUserDetails($conn, $uid) {
    $stmt = $conn->prepare("SELECT uname, full_name, mobile, email_id, address FROM registration WHERE uid = ?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $result;
}

// Fetch cart details
function fetchCartDetails($conn, $uid) {
    $stmt = $conn->prepare("SELECT pname, image, price, qty FROM cart WHERE uid = ?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}

// Fetch order history
function fetchOrderHistory($conn, $uid) {
    $stmt = $conn->prepare("SELECT pid, order_date, status, total_amount FROM order_history WHERE uid = ?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}

$user = fetchUserDetails($conn, $uid);
$cart = fetchCartDetails($conn, $uid);
$orders = fetchOrderHistory($conn, $uid);

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
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        .container1 {
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            border-bottom: 3px solid #4CAF50;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
        .section1 {
            margin-bottom: 20px;
            padding: 10px;
            background: #fafafa;
            border-radius: 5px;
        }
        .section1 p {
            margin: 5px 0;
        }
        .section1 img {
            max-width: 120px;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 3px;
        }
        hr {
            border: 0;
            height: 1px;
            background: #ddd;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container1">
        <h2>User Profile</h2>
        <?php if ($user): ?>
            <div class="section1">
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
            <div class="section1">
                <p><strong>Product Name:</strong> <?php echo htmlspecialchars($item['pname']); ?></p>
                <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="Product Image">
                <p><strong>Price:</strong> ₹<?php echo htmlspecialchars($item['price']); ?></p>
                <p><strong>Quantity:</strong> <?php echo htmlspecialchars($item['qty']); ?></p>
            </div>
            <hr>
        <?php endforeach; ?>

        <h2>Order History</h2>
        <?php foreach ($orders as $order): ?>
            <div class="section1">
                <p><strong>Product ID:</strong> <?php echo htmlspecialchars($order['pid']); ?></p>
                <p><strong>Order Date:</strong> <?php echo htmlspecialchars($order['order_date']); ?></p>
                <p><strong>Status:</strong> <?php echo htmlspecialchars($order['status']); ?></p>
                <p><strong>Total Amount:</strong> ₹<?php echo htmlspecialchars($order['total_amount']); ?></p>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>

    <?php include '../footer.php'; ?>
</body>
</html>