<?php
session_start();
include('../../Backend/connection.php');
$uid =  $_SESSION['uid'];

$oid=$_GET['oid'];

    $sql = "SELECT  * FROM order_history WHERE uid=$uid AND oid=$oid";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();

// Bill details (example data)

$billNumber = $row['oid'];
$date = $row['order_date']; 
$price = $row['price'];
$qty = $row['qty'];
$totalAmount = $row['total_amount'];
$mobile_no = $row['mobile_no'];
$address = $row['temp_address'];
$customerName = $row['customer_name'];


    $pid = $row['pid'];

    $sql_name = "SELECT * FROM product WHERE pid=$pid";
    $result_name = mysqli_query($conn,$sql_name);
    $row1 = $result_name->fetch_assoc();

    $product_name = $row1['pname'];


// Generate the bill content
$billContent = "
<!DOCTYPE html>
<html>
<head>
    <title>Bill #$billNumber</title>
</head>
<body>
    <h1>MedDrip Pharmacy - Bill</h1>
    <hr>
    <p><strong>Bill Number:</strong> $billNumber</p>
    <p><strong>Customer Name:</strong> $customerName</p>
    <p><strong>Date:</strong> $date</p>
    <p><strong>Product:</strong> $product_name</p>
    <p><strong>Price:</strong> $price</p>
    <p><strong>Quentity:</strong> $qty</p>
    <p><strong>Mobile NO:</strong> $mobile_no</p>
    <p><strong>Address:</strong> $address</p>

    <hr>
    <h2>Total Amount: ₹$totalAmount</h2>
    <hr>
</body>
</html>";

// Set headers to force download
header('Content-Type: text/html');
header('Content-Disposition: attachment; filename="bill_' . $billNumber . '.html"');

// Output the bill content
echo $billContent;
?>
