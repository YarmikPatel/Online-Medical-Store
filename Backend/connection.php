<?php
$servername="localhost";
$username="root";
$password="";
$dbname="medical_store";

//create connection

$con = new mysqli($servername,$username,$password,$dbname);

//check connection

if($con->connect_error){
        die("commection failed :" .$con->connect_error);
}else{
    echo "Connection succesfully with apache server!";
}

?>