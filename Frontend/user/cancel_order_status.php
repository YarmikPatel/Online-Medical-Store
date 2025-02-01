<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../Backend/connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $oid = isset($_POST['order_id']) ? intval($_POST['order_id']) : 0;

    if($oid > 0){
        $sql = "UPDATE order_history SET status = 'Cancelled' WHERE oid = ?";
        $result = $conn->prepare($sql);
        $result->bind_param("i", $oid);
    

        if($result->execute()){
            header("Location: orders.php?oid=$oid"); // Redirect to index.php
            exit;
        }else{
            echo ("Failed to cancel". $conn->error);
        }
    }else {
        echo "Invalid order ID!";
    }
}else{
    echo ("Server Error");
}
?>