<?php
// Navbar.php
?>

<style>
    .navbar-menu {
        background-color: #1e2a38;
        padding: 10px 20px;
        color: white;
    }

    .navbar-menu ul {
        list-style: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-menu ul li {
        margin: 0 10px;
    }

    .navbar-menu ul li a {
        text-decoration: none;
        color: white;
        font-size: 16px;
        padding: 8px 15px;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .navbar-menu ul li a:hover,
    .navbar-menu ul li a.index {
        background-color: #4CAF50;
        color: #ffffff;
    }
</style>

<div class="navbar-menu">
    <ul>
        <li><a href="index.php" class="index" aria-label="Home">Home</a></li>
        <li><a href="lab_test.php" aria-label="Lab Test">Lab Test</a></li>
        <li><a href="cart.php" aria-label="Cart">Cart</a></li>
        <li><a href="order_history.php" aria-label="Order History">Order History</a></li>
        <li><a href="/user/prescription.php" aria-label="Prescription">Prescription</a></li>
        <li><a href="login.php" aria-label="Login">Login</a></li>
    </ul>
</div>
