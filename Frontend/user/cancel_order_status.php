<?php
include('../../Backend/connection.php');

if(issset($_POST['oid'])){
    $oid = $_POST['oid'];

    $sql = "UPDATE order_history SET status = 'Cancelled' WHERE oid = ?";
    $result = mysqli_query($conn,$sql);

    if($result){
        echo json_encode(["success" => "Order cancelled"]);
    }else{
        echo json_encode(["error" => "Failed to cancel"]);
    }
}else{
    echo json_encode(["error" => "Order ID not found"]);
}
?>