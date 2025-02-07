<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../Backend/connection.php');

if(isset($_GET['oid'])){
    $oid = $_GET['oid'];

    $sql = "SELECT status FROM order_history WHERE oid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $oid);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();

    if(!$order){
        echo "Order not found";
        exit;
    }

    $currentStatus = $order['status'];

    // Determine the next status (simulate the update process)
    $nextStatus = null;
    if(strcasecmp($currentStatus, "Pending") == 0){
        $nextStatus = "Shipped";
    }else if(strcasecmp($currentStatus, "Shipped") == 0){
        $nextStatus = "Out for Delivery";
    }else if(strcasecmp($currentStatus, "Out for Delivery") == 0){
        $nextStatus = "Delivered";
    }
    // If the order is already "Delivered", remain there.

    // If there is a next status, update it in the  database.
    if($nextStatus !== null){
        $updateQuery = "UPDATE order_history SET status = ? WHERE oid = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("si", $nextStatus, $oid);
        $updateStmt->execute();

        // Set the current status to the updated value.
        $currentStatus = $nextStatus;
    }

    // Return the current (or updated) status.
    echo $currentStatus;
    //echo $order['status']; // Send updated status
}
?>