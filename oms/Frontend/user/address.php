<?php
session_start();
if(!isset($_SESSION['uid'])){
    die('user not logged in. UID not found in session');
}
include('../../Backend/connection.php');
include('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Saved Addresses</h1>
        <form action="summary.php" method="POST">
            <div class="saved-addresses">
                <label>
                    <input type="radio" name="address" value="123 Main St, City">
                    123 Main St, City
                </label>
            </div>
            <h2>Temporary Address</h2>
            <input type="text" name="temp_address" placeholder="Enter temporary address">
            <button type="submit">Continue</button>
        </form>
    </div>
</body>
</html>
