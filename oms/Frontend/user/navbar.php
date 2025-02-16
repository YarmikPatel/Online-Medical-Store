<?php

$username = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, <?php echo $username; ?></title>
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

        /* Top Navbar Styling */
        .top-navbar {
            position: fixed; /* Fixed for scroll effect */
            top: 0;
            width: 100%;
            background-color: #161937; /* Darker background */
            display: flex;
            justify-content: space-between; /* Align items to the right */
            align-items: center;
            padding: 10px 30px;
            z-index: 1001; /* Higher z-index than main navbar */
            /* transition: transform 0.3s ease; For smooth show/hide */
            /* transition: transform 0.3s ease, top 0.3s ease; Add top transition */
            transition: opacity 0.3s ease, transform 0.3s ease, top 0.3s ease; /* Use opacity for smoother show/hide */
            opacity: 1; /* Initially visible */
            top: 0; /* Make sure it is at the top */
            height: 80px;
        }

        .top-navbar ul {
            list-style: none;
            display: flex;
            align-items: center;
        }

        .top-navbar ul li {
            margin-left: 20px; /* Reduced margin */
        }

        .top-navbar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 16px; /* Smaller font size */
            transition: color 0.3s ease;
        }

        .top-navbar ul li a:hover {
            color: #1abc9c;
        }

        /* Navbar Styling */
        .navbar {
            position: sticky;
            /* top: 0; */
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
            top: 70px; /* Position below top-navbar initially */
            height: 75px;
            margin-top: 14px;
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

        /* Categories Navbar Styling */
    .categories-navbar {
            position: sticky;
            /* top: 170px; Positioned below the main navbar. Adjust as needed */
            width: 100%;
            background-color: #f0f0f0; 
            /* Light background for categories */
            padding: 10px 30px;
            
            z-index: 999; /* Below the main navbar */
            /* transition: transform 0.3s ease, top 0.3s ease; Add top transition */
            transition: transform 0.3s ease;
            top: 140px; /* Position below navbar initially */
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
    z-index: 999;
}

#backToTopBtn:hover {
    background-color: darkgreen;
    opacity: 0.9;
}

/* .user {
    display: inline;
    text-decoration: none;
    color: white;
    margin-left: 25px;
    font-size: 22px;
} */

.user-area {
    /* display: flex; Enable flexbox for user area */
    /* flex-direction: row; */
    /* align-items: center;  */
    /* Vertically center items */
    /* gap: 20px; Add spacing between user info and logout */
}

.user-profile {
    display: flex;
    align-items: center;
    gap: 15px;
    text-decoration: none;
    color: white;
    font-size:20px;
}

/*.user-profile img {
    border-radius: 50%;
}

.user-profile .user {
    margin: 0;
} */

.logout {
    color: white;
    text-decoration: none;
    font-size: 20px;
    background-color: transparent;
    padding: 6px 14px;
    border-radius: 20px;
    border: 2px solid white;
}
    </style>
</head>
<body>
<?php
// Get the current page name
$current_page = basename($_SERVER['PHP_SELF']);
// Check if it's the home page (e.g., 'user_login_index.php')
$is_home_page = ($current_page == 'user_login_index.php' || $current_page == 'kids.php' || $current_page == 'teenagers.php' || $current_page == 'men.php' || $current_page == 'women.php' || $current_page == 'senior_citizen.php' || $current_page == ''); // Add other home page names if needed

?>

    <nav class="top-navbar">
                <div class="user-area">
                    <a href="profile.php" class="user-profile">
                        <img src="../../Backend/image1/profile-user.png" alt="Profile" height="50px" width="50px">
                    <?php
                    // session_start();
                        echo '<p class="user">Hi, ' . $username . ' !</p>';
                    ?>
                    </a>
                </div>
                <div class="logout-area">
                    <a href="logout.php" class="logout">Log Out</a>
                </div>
    </nav>

    <nav class="navbar">
        <a href="#" class="logo">MediDrip</a>
        <span class="menu-toggle">&#9776;</span>
        <ul>
            <li><a href="user_login_index.php" class="<?php echo ($current_page == 'user_login_index.php' || $current_page == '') ? 'active' : ''; ?>">HOME</a></li>
            <li><a href="lab_test.php" class="<?php echo ($current_page == 'lab_test.php') ? 'active' : ''; ?>">Lab Test</a></li>
            <li><a href="cart.php" class="<?php echo ($current_page == 'cart.php') ? 'active' : ''; ?>"> My Cart</a></li>
            <li><a href="orders.php" class="<?php echo ($current_page == 'orders.php') ? 'active' : ''; ?>">My Orders</a></li>
            <li><a href="prescription.php" class="<?php echo ($current_page == 'prescription.php') ? 'active' : ''; ?>">Prescription</a></li>
            <li><a href="feedback.php" class="<?php echo ($current_page == 'feedback.php') ? 'active' : ''; ?>">Feedback</a></li>
        </ul>
    </nav>

    <?php if ($is_home_page): ?>
    <nav class="categories-navbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="user_login_index.php" class="category-name" style=" border-radius: 30px;  color: green; ">All Products</a>
            </li>
            <li class="nav-item">
                <a href="kids.php" class="category-name" style="border-radius: 30px; color: green;">Kids 0-12 years</a>
            </li>
            <li class="nav-item">
                <a href="teenagers.php" class="category-name" style="border-radius: 30px; color: green;">Teenagers 12-18 years</a>
            </li>
            <li class="nav-item">
                <a href="men.php" class="category-name" style="border-radius: 30px; color: green;">Men 18+ years</a>
            </li>
            <li class="nav-item">
                <a href="women.php" class="category-name" style="border-radius: 30px; color: green;">Women 18+ years</a>
            </li>
            <li class="nav-item">
                <a href="senior_citizen.php" class="category-name" style="border-radius: 30px; color: green;">Senior Citizen 60+ years</a>
            </li>
        </ul>
        
    </nav>
    <?php endif; ?>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const navLinks = document.querySelector('.navbar ul');  
        const navbar = document.querySelector('.navbar');
        const topNavbar = document.querySelector('.top-navbar');  // Get the top navbar
        const navItems = document.querySelectorAll('.navbar ul li a');
        const categoriesNavbar = document.querySelector('.categories-navbar'); // Declare categoriesNavbar!

        let hasScrolled = false; // Flag to track if the user has scrolled
        let isInitialLoad = true; // New flag to track initial load

        // Toggle menu visibility on click
        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('show');
        });

        // let prevScrollPos = window.pageYOffset; // Store previous scroll position

        // Change navbar background on scroll
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            // let scrollPosition = window.scrollY;
            let currentScrollPos = window.pageYOffset;

            if (isInitialLoad) { // Handle initial load behavior
                isInitialLoad = false; // Set flag after initial load
            }

            // Hide/Show top navbar on scroll
            if (currentScrollPos > 0) {  // Adjust the scroll threshold as needed
                hasScrolled = true; // Set the flag
                topNavbar.style.opacity = 0; // Hide top navbar
                topNavbar.style.transform = 'translateY(-100%)'; // Hide
                navbar.style.transform = 'translateY(-70px)'; // Main Nav Fixed
                categoriesNavbar.style.transform = 'translateY(-70px)'; // Categories Nav Fixed
            } else if (!hasScrolled) {// At the very TOP AND hasn't scrolled yet // Initial load (at the top)
                topNavbar.style.opacity = 1; // Show top navbar
                topNavbar.style.transform = 'translateY(0)'; // Show top navbar
                // navbar.style.transform = 'translateY(70px)'; // Main Nav Below Top Nav
                // categoriesNavbar.style.transform = 'translateY(140px)'; // Categories Nav Below Main Nav
            } else{// At the very TOP BUT has scrolled before // Scrolling UP (after initial scroll)
                topNavbar.style.opacity = 1; // Show it after initial scroll
                topNavbar.style.transform = 'translateY(0)';
                navbar.style.transform = 'translateY(2px)';
                categoriesNavbar.style.transform = 'translateY(2px)';
            }

            // prevScrollPos = currentScrollPos; // Update previous scroll position
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
