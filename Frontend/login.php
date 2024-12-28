<?php
include('../Backend/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login - MedDrip Pharmacy</title>
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background: url('https://via.placeholder.com/1500') no-repeat center center fixed; /* Background Image */
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
            overflow: hidden;
        }

        /* Apply a blur effect to the background */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5); /* Dark overlay */
            backdrop-filter: blur(10px); /* Blur effect */
            z-index: -1;
        }

        /* Main Login Container */
        .login-container {
            background: rgba(255, 255, 255, 0.8); /* Light background with transparency */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            width: 400px;
            text-align: center;
            backdrop-filter: blur(10px); /* Blurred container */
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .login-container h2 {
            font-size: 28px;
            margin-bottom: 30px;
            font-weight: bold;
            color: #2d3e50; /* Dark text for better readability */
        }

        .login-container img {
            width: 70px;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.6);
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            color: #2d3e50;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .input-field:focus {
            background-color: rgba(255, 255, 255, 0.8);
            border-color: #2d3e50;
            outline: none;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background-color: #4CAF50; /* Fresh Green */
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #388e3c; /* Darker Green for hover effect */
        }

        .registration {
            margin-top: 15px;
        }

        .registration a {
            color: #2d3e50;
            font-size: 14px;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .registration a:hover {
            color: #4CAF50;
            text-decoration: underline;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            text-align: center;
            font-size: 12px;
            color: #ddd;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container {
            animation: fadeIn 1s ease-out;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .login-container {
                width: 90%;
                padding: 25px;
            }

            .input-field {
                padding: 12px;
                font-size: 14px;
            }

            .submit-btn {
                padding: 12px;
                font-size: 16px;
            }
        }

        @media (max-width: 768px) {
            .login-container {
                width: 80%;
                padding: 35px;
            }
        }

    </style>
</head>
<body>

<div class="login-container">
    <img src="https://via.placeholder.com/70" alt="MedDrip Pharmacy Logo">
    <h2>Login to MedDrip Pharmacy</h2>
    <form class="login" action="" method="post">
        <div class="email-id">
            <input type="email" name="email" id="email" class="input-field" placeholder="Enter Email ID" required>
        </div>
        <div class="password">
            <input type="password" name="pass" id="pass" class="input-field" placeholder="Enter Password" required>
        </div>
        <div class="check-data">
            <input type="submit" value="Login" class="submit-btn" id="check_data">
        </div>
        <div class="registration">
           NEW USER? <a href="user_registration.php">Register here</a>
        </div>
    </form>
</div>

<!-- PHP code to handle login -->
<?php 
     if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $conn->real_escape_string($_POST['email']);
        $pass = $conn->real_escape_string($_POST['pass']);
       
        $sql = "SELECT * FROM `registration` WHERE upass='$pass' and email_id='$email'";
        $result = mysqli_query($conn,$sql);

            if($result && mysqli_num_rows($result) > 0){
                session_start();
                $_SESSION['uid']=$uid;
               echo "<script>alert('Loging successfuly...');</script>";
               header("Location: user/user_login_index.php");  
            }else{
                echo "<script>alert('Invalid Credentials');</script>";
            }
         }
    ?>
</body>
</html>
