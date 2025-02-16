<?php
    session_start();
    
    //Check if user is logged in
    if(!isset($_SESSION['uid'])){
        echo 'user not logged in. UID not found in session';
        header('location: ../login.php');
    }
?>