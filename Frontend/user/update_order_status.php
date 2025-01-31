<?php
include('../../Backend/connection.php');

if(isset($_POST['oid']) && isset($_POST['new_status'])){
    $oid = $_POST['oid'];
    $new_status = $_POST['new_status'];

    $sql = "UPDATE order_history SET status = ? WHERE oid = ?";
    $result = mysqli_query($conn,$sql);

    if($result){
        echo json_encode(["success " => "Order status updated"]);
    }else{
        echo json_encode(["error" => "Failed to update"]);
    }
}else{
    echo json_encode(["error" => "Server Error"]);
}
?>