<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unique Modern Navbar</title>
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
            position: fixed;
            top: 0;
            left: 0;
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
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="#" class="logo">MediStore</a>
        <span class="menu-toggle">&#9776;</span>
        <ul>
            <li><a href="user_login_index.php">HOME</a></li>
            <li><a href="lab_test.php">Lab Test</a></li>
            <li><a href="cart.php"> My Cart</a></li>
            <li><a href="orders.php">My Orders</a></li>
            <li><a href="prescription.php">Priscription</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const navLinks = document.querySelector('.navbar ul');
        const navbar = document.querySelector('.navbar');

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
