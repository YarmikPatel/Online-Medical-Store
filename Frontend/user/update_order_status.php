<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../Backend/connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $oid = isset($_POST['order_id']) ? intval($_POST['order_id']) : 0;
    $new_status = isset($_POST['new_status']) ? $_POST['new_status'] : '';

    if ($oid > 0 && !empty($new_status)) {
        $sql = "UPDATE order_history SET status = ? WHERE oid = ?";
        $result = $conn->prepare($sql);
        $result->bind_param("si", $new_status, $oid);
        

        if($result->execute()){
            header("Location: orders.php?oid=$oid");
            exit;
        }else{
            echo ("Failed to update". $conn->error);
        }
    }else {
        echo "Invalid order ID or status!";
    }
}else{
    echo ("Server Error");
}
?>