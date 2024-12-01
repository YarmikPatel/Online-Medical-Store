<?php
    // Start or resume the session
    session_start();

    // Clears all session variables
    session_unset();
    
    // Destory the current session
    session_destroy();

    echo $_SESSION . " your session is ended, you are logged out";
    // Redirect to admin login page
    header('location: index.php');
?>