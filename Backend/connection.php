<?php
$servername="localhost";
$username="root";
$password="";
$dbname="medical_store";

//create connection

$conn = new mysqli($servername,$username,$password,$dbname);

//check connection

if($conn->connect_error){
        // die("commection failed :" .$conn->connect_error);
        die("commection failed :");
}
?>