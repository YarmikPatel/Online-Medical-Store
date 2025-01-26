<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedDrip Pharmacy Footer</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure the body takes up the full viewport height */
        }

        main {
            flex: 1; /* Push the footer to the bottom if there's not enough content */
        }

        footer {
            background-color: #2c3e50;
            color: #f5f5f5;
            padding: 40px 20px;
            text-align: center;
        }

        footer .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            gap: 20px;
        }

        /* Footer Sections */
        .footer-section {
            flex: 1 1 calc(25% - 20px);
            min-width: 200px;
        }

        .footer-section h2,
        .footer-section h3 {
            color: #00b894;
            margin-bottom: 10px;
        }

        .footer-section p,
        .footer-section a {
            color: #d1d1d1;
            font-size: 14px;
            line-height: 1.6;
            text-decoration: none;
        }

        .footer-section a:hover {
            color: #00b894;
            text-decoration: underline;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 8px;
        }

        .footer-section ul li a {
            color: #d1d1d1;
            text-decoration: none;
        }

        .footer-section ul li a:hover {
            color: #00b894;
        }

        /* Social Icons */
        .social-icons a {
            display: inline-block;
            margin-right: 15px;
            color: #d1d1d1;
            font-size: 14px;
            text-decoration: none;
        }

        .social-icons a:hover {
            color: #00b894;
        }

        /* Footer Bottom */
        .footer-bottom {
            margin-top: 20px;
            border-top: 1px solid #333;
            padding-top: 10px;
            font-size: 12px;
            color: #aaa;
        }
    </style>
</head>
<body>
    <main>
        <!-- Main content of your page -->
    </main>
    <footer>
        <div class="container">
            <!-- Logo and About -->
            <div class="footer-section about">
                <h2>MedDrip Pharmacy</h2>
                <p>
                    Your trusted online pharmacy, offering a wide range of medicines for every age group. 
                    Quality, care, and convenience at your fingertips.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="footer-section links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="categories.html">Categories</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="privacy.html">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Contact Information -->
            <div class="footer-section contact">
                <h3>Contact Us</h3>
                <p>Email: <a href="mailto:support@meddrip.com">support@meddrip.com</a></p>
                <p>Phone: +91-9876543210</p>
                <p>Address: 123, MedDrip Street, Ahmedabad, Gujarat, India</p>
            </div>

            <!-- Social Media -->
            <div class="footer-section social">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="https://facebook.com" target="_blank">Facebook</a>
                    <a href="https://twitter.com" target="_blank">Twitter</a>
                    <a href="https://instagram.com" target="_blank">Instagram</a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-bottom">
            <p>© 2025 MedDrip Pharmacy. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
