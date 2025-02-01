<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../Backend/connection.php');

// Get order_id from URL (or default to 1 for testing)
$oid = isset($_GET['oid']) ? intval($_GET['oid']) : 1;

// Fetch order status
$query = "SELECT status FROM order_history WHERE oid = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $oid);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();

// Define order status steps
$statuses = ["Pending", "Shipped", "Out for Delivery", "Delivered"];
$currentIndex = array_search($order['status'], $statuses);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="20">
    <title>Persistent Order Status Tracker</title>
    <style>
        /*body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }*/

        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        .status { font-size: 20px; font-weight: bold; margin: 20px; }
        .button-container { margin-top: 20px; }
        button { padding: 10px 15px; font-size: 16px; margin: 5px; cursor: pointer; }
    </style>
</head>
<body>

<h2>Order Status Tracker</h2>
    <p>Order ID: <?php echo $oid; ?></p>
    <p class="status">Current Status: <?php echo $order['status']; ?></p>

    <div class="button-container">
        <?php 
        if ($currentIndex !== false && $currentIndex < count($statuses) - 1){
            $new_status = $statuses[$currentIndex + 1]; // Move to the next stage
            $update_query = "UPDATE order_history SET status = ? WHERE oid = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param("si", $new_status, $order_id);
            $update_stmt->execute();
        }
        ?>
        <form action="update_order_status.php" method="POST">
                <input type="hidden" name="order_id" value="<?php echo $oid; ?>">
                <input type="hidden" name="new_status" value="<?php echo $statuses[$currentIndex + 1]; ?>">
                <button type="submit">Update Status</button>
            </form>
        <!-- <button id="cancelOrder" style="display: block; width: 100%; margin-top: 20px; padding: 10px; background: red: color: white; border: none; cursor: pointer;">Cancel Order</button> -->
        <form action="cancel_order_status.php" method="POST">
            <input type="hidden" name="order_id" value="<?php echo $oid; ?>">
            <button type="submit" style="background-color: red; color: white;">Cancel Order</button>
        </form>
    </div>
</body>
</html>

<!-- <div class="container">
        <h2 class="title">Order Status</h2>
        <div class="status-bar">
            <div class="status-step" id="step-1">
                <div class="status-circle"></div>   
                <div class="status-text">Pending</div>
            </div>
            <div class="status-step" id="step-2">
                <div class="status-circle"></div>
                <div class="status-text">Shipped</div>
            </div>
            <div class="status-step" id="step-3">
                <div class="status-circle"></div>
                <div class="status-text">Out for Delivery</div>
            </div>
            <div class="status-step" id="step-4">
                <div class="status-circle"></div>
                <div class="status-text">Delivered</div>
            </div>
        </div> -->