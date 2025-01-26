<?php
session_start();
include('../Backend/connection.php');

if (isset($_POST['change_pass'])) {
    $email = $_POST['email'];
    $pass = $_POST['new_password'];
    $confipass = $_POST['confirm_password'];

    // Check if the passwords match
    if ($pass !== $confipass) {
        echo "<script>document.getElementById('check_email').textContent = 'Passwords do not match.'; document.getElementById('check_email').style.color = 'red';</script>";
    } else {
        // Check if the email exists
        $sql = "SELECT email_id FROM registration WHERE email_id='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Update password in the database
            $sql = "UPDATE registration SET upass='$pass' WHERE email_id='$email'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>document.getElementById('check_email').textContent = 'Password updated successfully!'; document.getElementById('check_email').style.color = 'green';</script>";
            } else {
                echo "<script>document.getElementById('check_email').textContent = 'Error updating password. Please try again.'; document.getElementById('check_email').style.color = 'red';</script>";
            }
        } else {
            echo "<script>document.getElementById('check_email').textContent = 'Email not found in the system.'; document.getElementById('check_email').style.color = 'red';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - MedDrip Pharmacy</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #e0f7fa, #80deea);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            width: 400px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .container h2 {
            color: #00796b;
            margin-bottom: 20px;
        }

        .container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #b2dfdb;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.3s;
        }

        .container input:focus {
            border-color: #00796b;
            outline: none;
            box-shadow: 0 0 8px rgba(0, 121, 107, 0.5);
        }

        .container button {
            width: 100%;
            padding: 12px;
            background: #009688;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .container button:hover {
            background: #00695c;
        }

        .error, .success {
            font-size: 14px;
            margin-top: 10px;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form id="forgotPasswordForm" method="POST">
            <!-- Email input and button to verify email -->
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <button type="button" id="verifyEmailBtn" onclick="verifyEmail()">Verify Email</button>

            <!-- Password fields (hidden initially) -->
            <div id="passwordFields" class="hidden">
                <input type="password" id="newPassword" name="new_password" placeholder="Enter new password" required>
                <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm new password" required>
                <button type="submit" name="change_pass" value="reset_password">Reset Password</button>
            </div>

            <!-- Success/Error message -->
            <div class="check_email" id="check_email"></div>
        </form>
    </div>

    <script>
        // Function to verify email and show password fields
        function verifyEmail() {
            var email = document.getElementById('email').value;
            if (email === "") {
                document.getElementById('check_email').textContent = "Please enter an email.";
                document.getElementById('check_email').style.color = 'red';
                return;
            }

            // Send an AJAX request to verify the email (optional, can also be done server-side)
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "verify_email.php", true); // Assuming you have a file to verify email
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.responseText == "email_exists") {
                    document.getElementById('check_email').textContent = "Email verified!";
                    document.getElementById('check_email').style.color = 'green';
                    document.getElementById('passwordFields').classList.remove('hidden');
                } else {
                    document.getElementById('check_email').textContent = "Email not found.";
                    document.getElementById('check_email').style.color = 'red';
                }
            };
            xhr.send("email=" + email);
        }
    </script>
</body>
</html>
