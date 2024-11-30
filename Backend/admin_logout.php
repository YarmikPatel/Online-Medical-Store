<?php
    // Start or resume the session
    session_start();

    // Clears all session variables
    session_unset();
    
    // Destory the current session
    session_destroy();

    // Redirect to admin login page
    header('location: index.php');
?>