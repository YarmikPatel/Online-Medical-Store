<?php
    include("connection.php");
    include("admin_session.php");

    // Admin specific content
    echo "<br>Welcome admin, " . $_SESSION['admin_name'];
?>