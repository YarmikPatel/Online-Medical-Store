<?php
    session_start();
    
    //Check if admin is logged in
    if(!isset($_SESSION['is_admin_logged_in']) || $_SESSION['is_admin_logged_in'] !==true){
        echo "Admin is logged in. " . $_SESSION['admin_name'];
        header('location: index.php');
        exit();
    }

    $admin_timeout = 10;
    if (isset($_SESSION['admin_last_activity']) && (time() - $_SESSION['admin_last_activity'] > $admin_timeout)) {
        // If last activity is over 30 minutes ago
        session_unset();
        session_destroy();
        header('location: index.php?timeout=true');
        exit();
    }
    $_SESSION['admin_last_activity'] = time(); // Update last activity timestamp
?>