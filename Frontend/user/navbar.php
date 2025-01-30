<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedDrip Pharmacy</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        /* Navbar Styling */
        .navbar {
            position: sticky;
            top: 0;
            width: 100%;
            background-color: #2c3e50;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            z-index: 1000;
            transition: background-color 0.3s ease;
        }

        .navbar .logo {
            color: #ecf0f1;
            font-size: 26px;
            font-weight: bold;
            text-decoration: none;
            letter-spacing: 1px;
        }

        /* Menu Items */
        .navbar ul {
            list-style: none;
            display: flex;
            align-items: center;
        }

        .navbar ul li {
            margin-left: 30px;
        }

        .navbar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 18px;
            position: relative;
            transition: color 0.3s ease;
        }

        .navbar ul li a:hover {
            color: #1abc9c;
        }

        .navbar ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: #1abc9c;
            left: 0;
            bottom: -5px;
            transition: width 0.3s ease;
        }

        .navbar ul li a:hover::after {
            width: 100%;
        }

        /* Active links */
        .navbar ul li a.active {
            color: #1abc9c;
            padding: 5px 10px;
        }

        .navbar ul li a.active::after {
            width: 100%;
        }

        /* Hamburger Menu */
        .menu-toggle {
            display: none;
            color: #ecf0f1;
            font-size: 30px;
            cursor: pointer;
            z-index: 1100;
        }

        /* Responsive Styles */
        @media (max-width: 1097px) {
            .navbar ul {
                position: absolute;
                top: 80px;
                left: 0;
                width: 100%;
                background-color: #34495e;
                flex-direction: column;
                align-items: center;
                padding: 20px 0;
                display: none;
                transform: translateY(-100%);
                transition: transform 0.3s ease;
            }

            .navbar ul.show {
                display: flex;
                transform: translateY(0);
            }

            .navbar ul li {
                margin: 15px 0;
            }

            .menu-toggle {
                display: block;
            }
        }

        /* Scroll Effect */
        .navbar.scrolled {
            background-color: #1abc9c;
        }

        ::-webkit-scrollbar {
            display: none;
        }


    </style>
</head>
<body>
<?php
// Get the current page name
$current_page = basename($_SERVER['PHP_SELF']);
?>
    <nav class="navbar">
        <a href="#" class="logo">MediStore</a>
        <span class="menu-toggle">&#9776;</span>
        <ul>
            <li><a href="user_login_index.php" class="<?php echo ($current_page == 'user_login_index.php' || $current_page == '') ? 'active' : ''; ?>">HOME</a></li>
            <li><a href="lab_test.php" class="<?php echo ($current_page == 'lab_tests.php') ? 'active' : ''; ?>">Lab Test</a></li>
            <li><a href="cart.php" class="<?php echo ($current_page == 'cart.php') ? 'active' : ''; ?>"> My Cart</a></li>
            <li><a href="orders.php" class="<?php echo ($current_page == 'orders.php') ? 'active' : ''; ?>">My Orders</a></li>
            <li><a href="prescription.php" class="<?php echo ($current_page == 'prescription.php') ? 'active' : ''; ?>">Prescription</a></li>
            <li><a href="feedback.php" class="<?php echo ($current_page == 'feedback.php') ? 'active' : ''; ?>">Feedback</a></li>   
        </ul>
    </nav>

    <?php
            $sql = "SELECT * FROM registration";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                if($row = $result->fetch_assoc()){
                    echo '<nav class="navbar">';
                    echo '<ul>';
                    echo '<li>';
                    echo '<a href="profile.php?uid=' .$row['uid'] . '"> <img src="../../Backend/image1/profile-user.png" alt="MedDrip Pharmacy Logo" height="50px" width="50px" ></a>';
                    //echo '<a href="profile.php?uid=' . $row['uid'] . '";">';
                    echo '</li>';
                    echo '<li><a href="logout.php" class="signout-button">Logout</a></li>';
                    echo '</ul>';
                    echo '</nav>';
                }
            } else {
                echo '<p>No products found.</p>';
            }
        ?>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const navLinks = document.querySelector('.navbar ul');
        const navbar = document.querySelector('.navbar');
        const navItems = document.querySelectorAll('.navbar ul li a');

        // Toggle menu visibility on click
        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('show');
        });

        // Change navbar background on scroll
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

</body>
</html>
