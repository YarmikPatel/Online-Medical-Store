<?php
session_start();
include('../../Backend/connection.php');
include('navbar.php');
if (!isset($_SESSION['uid'])) {
    die('User not logged in. UID not found in session.');
}
$uid = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<!-- Footer -->
<?php include('../footer.php'); ?>
</body>
</html>