<?php
session_start();
include('../../Backend/connection.php');
$uid =  $_SESSION['uid'];

$pre_id=$_GET['pre_id'];

$sql = "DELETE FROM prescription_detail WHERE uid=$uid AND pre_id=$pre_id";
$result = mysqli_query($conn,$sql);

echo "<script>window.location.href = 'prescription.php';</script>";

?>