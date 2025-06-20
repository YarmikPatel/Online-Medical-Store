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
            /* transition: transform 0.3s ease, top 0.3s ease; Add top transition */
            transition: transform 0.3s ease;
            /* top: 70px; Position below top-navbar initially */
            height: 75px;
            /* margin-top: 14px; */
        }

        .navbar .logo {
            color: #ecf0f1;
            font-size: 26px;
            font-weight: bold;
            text-decoration: none;
            letter-spacing: 1px;
            margin-top: 10px;
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
            /* background-color: #2c3e50; */
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
            /* color: #2c3e50; */
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

        /* Categories Navbar Styling */
    .categories-navbar {
            position: sticky;
            top: 70px; /* Positioned below the main navbar. Adjust as needed */
            width: 100%;
            background-color: #f0f0f0; 
            /* Light background for categories */
            padding: 10px 30px;
            
            z-index: 999; /* Below the main navbar */
            /* transition: transform 0.3s ease, top 0.3s ease; Add top transition */
            transition: transform 0.3s ease;
            /* top: 140px; Position below navbar initially */
            height: 75px;
        }

        .categories-navbar a {
            color: #333;
            text-decoration: none;
            font-size: 16px;
            padding: 5px 10px; /* Add some padding around the text */
            border-radius: 5px; /* Optional: Add rounded corners */
            transition: background-color 0.3s, color 0.3s;
        }

        .categories-navbar a:hover {
            background-color: #ddd; /* Slightly darker background on hover */
            color: #1abc9c;
        }

        .category-name {
            margin-top:10px;
            border: 2px solid green;
        }
        
        .navbar-nav {
            display: flex;
            justify-content: space-around; /* Distribute categories evenly */
            list-style: none;
        }

        .nav-item {
            padding: 20px 10px;
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


        /*scroll up */
        #backToTopBtn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: green;
    color: white;
    border: none;
    border-radius: 10px;
    padding: 12px 18px;
    font-size: 20px;
    cursor: pointer;
    display: none; /* Initially hidden */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    transition: opacity 0.3s, background-color 0.3s;
    z-index: 100;
}

#backToTopBtn:hover {
    background-color: darkgreen;
    opacity: 0.9;
}
    </style>
</head>
<body>
<?php
// Get the current page name
$current_page = basename($_SERVER['PHP_SELF']);
?>
    <nav class="navbar">
        <div>
            <a href="#" class="logo">MedDrip</a>
        </div>
        <span class="menu-toggle">&#9776;</span>
        <ul>
            <li><a href="index.php" class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : ''; ?>">HOME</a></li>
            <li><a href="lab_test.php" class="<?php echo ($current_page == 'lab_test.php') ? 'active' : ''; ?>">Lab Test</a></li>
            <li><a href="login.php" class="<?php echo ($current_page == 'login.php') ? 'active' : ''; ?>">Feedback</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <nav class="categories-navbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="user_login_index.php" class="category-name" style=" border-radius: 30px;  color: green; ">All Products</a>
            </li>
            <li class="nav-item">
                <a href="user/kids.php" class="category-name" style="border-radius: 30px; color: green;">Kids</a>
            </li>
            <li class="nav-item">
                <a href="teenagers.php" class="category-name" style="border-radius: 30px; color: green;">Teenagers</a>
            </li>
            <li class="nav-item">
                <a href="men.php" class="category-name" style="border-radius: 30px; color: green;">Men</a>
            </li>
            <li class="nav-item">
                <a href="women.php" class="category-name" style="border-radius: 30px; color: green;">Women</a>
            </li>
            <li class="nav-item">
                <a href="senior_citizen.php" class="category-name" style="border-radius: 30px; color: green;">Senior Citizen</a>
            </li>
        </ul>
    </nav>

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
                // navbar.style = 
            } else {
                navbar.classList.remove('scrolled');
            }
        });


        //////////////////////////////// scroll up 
        window.onscroll = function () {
    toggleButton();
};

function toggleButton() {
    let button = document.getElementById("backToTopBtn");
    if (window.scrollY > 200) {
        button.style.display = "block";
    } else {
        button.style.display = "none";
    }
}

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: "smooth" });
}
    </script>
<button id="backToTopBtn" onclick="scrollToTop()">▲</button>
</body>
</html>
