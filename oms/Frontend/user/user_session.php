<?php
    session_start();
    
    //Check if user is logged in
    if(!isset($_SESSION['is_user_logged_in'])){
        echo "User is logged in. " . $_SESSION['user_name'];
        header('location: index.php');
        exit();
    }
?>