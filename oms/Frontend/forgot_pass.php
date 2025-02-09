<?php
session_start();
include('../Backend/connection.php');

$emailError = $passwordError = $successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate input fields
    if (empty($email)) {
        $emailError = "Please enter your email.";
    } elseif (empty($new_password) || empty($confirm_password)) {
        $passwordError = "Please enter and confirm your new password.";
    } elseif ($new_password !== $confirm_password) {
        $passwordError = "Passwords do not match!";
    } else {
        // Check if email exists
        $stmt = $conn->prepare("SELECT email_id FROM registration WHERE email_id = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            // Update password in the database
            $update_stmt = $conn->prepare("UPDATE registration SET upass = ? WHERE email_id = ?");
            $update_stmt->bind_param("ss", $hashed_password, $email);
            $update_stmt->execute();

            if ($update_stmt->affected_rows > 0) {
                $successMessage = "Password updated successfully!";
            } else {
                $passwordError = "Error updating password. Please try again.";
            }
        } else {
            $emailError = "Email not found!";
        }

        $stmt->close();
        $conn->close();
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
            width: 90%;
            padding: 12px;
            margin: 10px auto;
            border: 1px solid #b2dfdb;
            border-radius: 5px;
            font-size: 14px;
            display: block;
            text-align: center;
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
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 5px;
            text-align: center;
            font-weight: bold;
            background: #ffebee;
            padding: 5px;
            border-radius: 5px;
        }
        .success {
            color: green;
            font-size: 14px;
            margin-top: 10px;
        }
        .email-container {
            margin-bottom: 20px;
        }
        .password-container {
            margin-bottom: 10px;
        }
        a {
            color: #2d3e50;
            font-size: 14px;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #4CAF50;
            text-decoration: underline;
        }
    </style>
    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var newPassword = document.getElementById('newPassword').value;
            var confirmPassword = document.getElementById('confirmPassword').value;
            var emailError = document.getElementById('emailError');
            var passwordError = document.getElementById('passwordError');

            emailError.textContent = "";
            passwordError.textContent = "";

            if (email === "") {
                emailError.textContent = "Please enter your email.";
                return false;
            }
            if (newPassword === "" || confirmPassword === "") {
                passwordError.textContent = "Please enter and confirm your new password.";
                return false;
            }
            if (newPassword !== confirmPassword) {
                passwordError.textContent = "Passwords do not match!";
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <form method="POST" onsubmit="return validateForm()">
            <div class="email-container">
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <div id="emailError" class="error"><?php echo $emailError; ?></div>
            </div>

            <div class="password-container">
                <input type="password" id="newPassword" name="new_password" placeholder="Enter new password" required>
            </div>
            <div>
                <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm new password" required>
                <div id="passwordError" class="error"><?php echo $passwordError; ?></div>
            </div>
            
            <button type="submit" name="change_pass">Change Password</button>
            <div class="success"><?php echo $successMessage; ?></div>
            | <a href="login.php">GO TO LOGIN</a> |
        </form>
    </div>
</body>
</html>
