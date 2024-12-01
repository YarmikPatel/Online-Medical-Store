<?php
    session_start();
    
    //Check if admin is logged in
    if(!isset($_SESSION['is_admin_logged_in']) || $_SESSION['is_admin_logged_in'] !==true){
        echo "Admin is logged in. " . $_SESSION['is_admin_logged_in'];
        header('location: index.php?timeout=true');
        exit();
    }

    //Admin session timeout
    //15 minutes of inactivity
    $admin_timeout = 900;

    if(isset($_SESSION['admin_last_activity']) && (time() - $_SESSION['admin_last_activity'] > $admin_timeout)){
        session_unset();
        session_destroy();
        header('location: index.php?timeout=true');
        exit();
    }

    //Updates the last activity
    $_SESSION['admin_last_activity'] = time();
?>