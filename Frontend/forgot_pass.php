<?php
    session_start();
    include('../Backend/connection.php');
   
    // $sql = "Select * from registration where email_id='$email_id'";
    // $result = mysqli_query($conn,$sql);
    // if(mysqli_num_rows($result) > 0){
    //     $emailTaken = true;
    // } 
    // if($emailTaken){
    //     echo "<script>document.getElementById('unameerrormsg').textContent = 'The username is already taken Please choose a different one.';</script>";
    // }else{
    //     echo "<script>document.getElementById('unameerrormsg').textContent = '';</script>";
    // }


    if(isset($_POST['change_pass'])){
        $email = $_POST['email'];
        $pass = $_POST['new_password'];
        $confipass = $_POST['confirm_password'];

        $sql ="SELECT email_id FROM registration where email_id='$email'";
        $result = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($result) > 0){
            $sql = "UPDATE registration SET upass=$pass WHERE email_id='$email'";
            $result = mysqli_query($conn,$sql);

            echo "<script>document.getElementById('check_email').textContent = 'ha moj ha';</script>";
            
        }else{
            echo "<script>document.getElementById('check_email').textContent = 'Registration unsuccessful';</script>";
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

        /* .hidden {
            display: none;
        } */
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form id="forgotPasswordForm" method="POST">
            <input type="email" id="email" name="email" placeholder="Enter your Gmail" required>
            <!-- <button type="button" id="verifyEmailBtn" name="change_pass">Verify Email</button> -->
            
            
            <div id="passwordFields" class="hidden">
                <input type="password" id="newPassword" name="new_password" placeholder="Enter new password" required>
                <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm new password" required>
                <button type="submit" name="change_pass" value="reset_password">Reset Password</button>
            </div>
            <div class="check_email" id="check_email"></div>
        </form>
    </div>    
</body>
</html>
