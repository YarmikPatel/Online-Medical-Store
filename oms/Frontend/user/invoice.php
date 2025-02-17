<?php
include('../../Backend/connection.php');
include 'navbar.php';

// Function to fetch order details and items from order_history
function getOrderHistory($conn, $orderId) {
    $sql = "SELECT oh.order_date, oh.total_amount, oh.user_id, u.user_name, u.user_address,
                   oh.product_name, oh.quantity, oh.price  -- Select all necessary fields
            FROM order_history oh
            JOIN users u ON oh.user_id = u.user_id  -- Assuming you have a users table
            WHERE oh.order_id = '$orderId'"; // Filter by order ID

    $result = $conn->query($sql);

    $orderData = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orderData[] = $row;  // Store each row (item) of the order
        }
    }
    return $orderData;
}

if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];
    $orderHistory = getOrderHistory($conn, $orderId);

    if (!empty($orderHistory)) { // Check if order data was found
        $orderDetails = $orderHistory[0]; // Get general order details from the first row
        ob_start();

        include 'invoice_template.php';

        $invoiceContent = ob_get_clean();

        require_once('tcpdf/tcpdf.php');

        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->writeHTML($invoiceContent, true, false, true, false, '');
        $pdf->Output('invoice_' . $orderId . '.pdf', 'D');
        exit();
    } else {
        echo "Order not found.";
    }
} else {
    echo "Order ID is missing.";
}

// $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice - Order #<?php echo $orderId; ?></title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 80%; margin: 20px auto; border: 1px solid #ddd; padding: 20px; } /* Improved container */
        h1 { text-align: center; margin-bottom: 20px; }
        .customer-info { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .total { text-align: right; font-weight: bold; }
        .footer { text-align: center; color: #777; margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Invoice - Order #<?php echo $orderId; ?></h1>

    <div class="customer-info">
        <p><strong>Customer:</strong> <?php echo $orderDetails['user_name']; ?></p>
        <p><strong>Address:</strong> <?php echo $orderDetails['user_address']; ?></p>
        <p><strong>Date:</strong> <?php echo $orderDetails['order_date']; ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderHistory as $item): ?>  <tr>
                    <td><?php echo $item['product_name']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>$<?php echo $item['price']; ?></td>
                    <td>$<?php echo $item['quantity'] * $item['price']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="total"><strong>Total:</strong></td>
                <td>$<?php echo $orderDetails['total_amount']; ?></td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <p>Thank you for your purchase!</p>
    </div>
</div>
</body>
</html>


// Generate and download the invoice
            ob_start(); // Start output buffering