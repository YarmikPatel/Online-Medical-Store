<?php
include('../../Backend/connection.php');
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user index</title>
    <link rel="stylesheet" href="user_sidebar.css"> 
</head>
<body>
<button class="toggle-btn" id="toggle-btn">☰</button>
    <?php include 'user_sidebar.php'; ?>
    <div>haah</div>
    <script src="user_sidebar.js"></script>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Index</title>
    <link rel="stylesheet" href="user_sidebar.css">
</head>
<body>
    <button class="toggle-btn" id="toggle-btn">☰</button>
    <div class="sidebar" id="sidebar">
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </div>
    <!-- <div class="content">
        <h1 id="home">Home Page</h1>
        <p>Welcome to the home page!</p>
        <h1 id="about">About Page</h1>
        <p>About our company...</p>
        <h1 id="services">Services</h1>
        <p>Our services include...</p>
        <h1 id="contact">Contact Page</h1>
        <p>Contact us at...</p>
    </div> -->
    <script src="user_sidebar.js"></script>
</body>
</html>
