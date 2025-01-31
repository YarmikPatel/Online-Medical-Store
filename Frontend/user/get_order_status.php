<?php
include('../../Backend/connection.php');

if(isset($_GET['oid'])){
    $oid = $_GET['oid'];

    $sql = "SELECT oid, order_date, status, price, qty, total_amount FROM order_history WHERE oid = ?";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    
    echo json_encode(["status" => $result['status']]);
}else{
    echo json_encode(["error" => "Order ID not found"]);
}
?>