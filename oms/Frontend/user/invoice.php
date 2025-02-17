<?php
include 'navbar.php';
include('../../Backend/connection.php');

// Function to generate a unique order ID
function generateOrderId() {
    return rand(100000, 999999); //  A simple random number generator, consider a more robust method in production.
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['place_order'])) {
        $orderId = generateOrderId();
        $userId = $_SESSION['user_id']; // Assuming you have user authentication and session management
        $orderDate = date("Y-m-d H:i:s");
        $totalAmount = $_POST['total_amount']; // Get total from the form

        // Insert order details into the database
        $sql = "INSERT INTO orders (order_id, user_id, order_date, total_amount) 
                VALUES ('$orderId', '$userId', '$orderDate', '$totalAmount')";

        if ($conn->query($sql) === TRUE) {

            // Insert order items (assuming you have a cart or order items)
            if (isset($_SESSION['cart'])) {  // Example using a cart session
                foreach ($_SESSION['cart'] as $item) {
                    $productId = $item['product_id'];
                    $quantity = $item['quantity'];
                    $price = $item['price']; // Get price per item

                    $orderItemsSql = "INSERT INTO order_items (order_id, product_id, quantity, price)
                                      VALUES ('$orderId', '$productId', '$quantity', '$price')";
                    $conn->query($orderItemsSql); // Error handling could be added here
                }
            }


            // Generate and download the invoice
            ob_start(); // Start output buffering

            // Include the invoice template (you can create a separate HTML file)
            include 'invoice_template.php'; // See the invoice_template.php content below

            $invoiceContent = ob_get_clean(); // Get the buffered output

            // Set headers for download
            header('Content-Type: application/pdf'); // Or application/octet-stream for generic download
            header('Content-Disposition: attachment; filename="invoice_' . $orderId . '.pdf"');

            // Use a PDF library (like TCPDF or dompdf) to generate the PDF
            require_once('tcpdf/tcpdf.php'); // Example using TCPDF (you'll need to install it)

            $pdf = new TCPDF();
            $pdf->AddPage();
            $pdf->writeHTML($invoiceContent, true, false, true, false, '');  // Pass the invoice HTML content
            $pdf->Output('invoice_' . $orderId . '.pdf', 'D'); // 'D' for download, 'I' for inline display

            // Clear the cart after successful order
            unset($_SESSION['cart']);

            exit(); // Important: Stop further script execution after download
        } else {
            echo "Error placing order: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        /* Add your CSS styling here */
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>Invoice - Order #<?php echo $orderId; ?></h1>

    <p>Date: <?php echo $orderDate; ?></p>

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
            <?php
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    $productName = $item['product_name']; // Make sure product name is in session
                    $quantity = $item['quantity'];
                    $price = $item['price'];
                    $subtotal = $quantity * $price;
                    echo "<tr>";
                    echo "<td>" . $productName . "</td>";
                    echo "<td>" . $quantity . "</td>";
                    echo "<td>$" . $price . "</td>";
                    echo "<td>$" . $subtotal . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
                <td>$<?php echo $totalAmount; ?></td>
            </tr>
        </tfoot>
    </table>

    <p>Thank you for your purchase!</p>

</body>
</html>