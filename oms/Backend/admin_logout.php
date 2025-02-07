<?php
    // Start or resume the session
    session_start();

    // Clears all session variables
    session_unset();
    
    // Destory the current session
    session_destroy();

    //give message
    echo "<script>alert('You have been logged out.');</script>";
 

    // Redirect to admin login page
    header('location: index.php');
    ?>