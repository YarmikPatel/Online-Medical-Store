<?php
include('../Backend/connection.php');
ob_start(); // Helps prevent header issues
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedDrip - User Sign Up</title>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: sans-serif;
            background: linear-gradient(135deg,rgb(171, 187, 216,1),rgb(85, 183, 113));
            /* background: linear-gradient(to bottom right, #F5F5F5, #D6EAF8 #F9E79F, #A3C4BC, #FFFFFF); */
            color: #fff;
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            min-height: 100vh; /* Ensure full viewport height */
        }

        .signup-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 40px; /* Increased padding */
            width: 890px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); /* Softer shadow */
            margin: 0 auto;
        }

        .signup-container h1, h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
        }

        .inputBx {
            margin-bottom: 20px;
        }

        .inputBx label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #eee; /* Slightly lighter label color */
        }

        .inputBx input,
        .inputBx textarea {
            width: calc(100% - 22px); /* Account for padding */
            padding: 10px;
            border: none;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            color: #fff; /* White input text */
            box-sizing: border-box;
            transition: background 0.3s ease; /* Smooth background transition */
        }

        .inputBx input:focus,
        .inputBx textarea:focus {
            background: rgba(255, 255, 255, 0.3);
            outline: none; /* Remove default outline */
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.2); /* Add a subtle glow on focus */
        }

        .inputBx textarea {
            /* resize: vertical; Allow vertical resizing of textarea */
            /* margin-top: 20px; */
            width: calc(95.4%);
            position: relative;
            left: 3%;
        }

        .signup-button {
            margin-top: 20px; /* Space above the button */
        }

        .signup-button button {
            width: 800px;
            padding: 12px;
            border: none;
            background: transparent;
            color: white;
            font-size: 16px;
            border-radius: 35px; /* Less rounded button */
            cursor: pointer;
            transition: background 0.3s ease;
            position: absolute;
            left: 23%;
            top: 77%;
            font-size: 20px;
        }

        .signup-button button:hover {
            background: linear-gradient(135deg,rgb(171, 187, 216,1),rgb(85, 183, 113)); /* Darker on hover */
            border: none;
        }

        .error-msg {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        #form-message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            display: none;
        }

        #form-message.success {
            background-color: #d4edda; /* Light green */
            color: #155724; /* Dark green */
            border: 1px solid #c3e6cb;
        }

        #form-message.error {
            background-color: #f8d7da; /* Light red */
            color: #721c24; /* Dark red */
            border: 1px solid #f5c6cb;
        }

        .reg_details_container{
            display: flex;
            position: relative;
            left: 3%;
        }

        #registraionForm{
            
        }

        ::placeholder {
            color: whitesmoke;
            opacity: 1; /* Firefox */
            font-size: 15px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        h2, h1, button{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }       

        h1  {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>
<body>
<div class="signup-container">
    
    <!-- <div class="alert-box success modal" id="successalertbox"></div> -->
    <!-- <div class="alert-box error" id="erroralertbox"></div> -->
    
    <h1>MedDrip Pharmacy</h1>
    <h2>User - Sign Up</h2>
        <form action="" method="post" id="registrationForm">
            <div class="reg_details_container">
                    <div class="inputBx" id="username">
                        <!-- <label for="uname">Enter User Name:</label> -->
                        <input type="text" id="uname" size="55" name="uname" placeholder="Enter your user name that will be used in the website" required>
                        <p class="error-msg" id="unameerrormsg"></p>
                    </div>
                    <div class="inputBx" id="fullname">
                        <!-- <label for="full_name">Enter Full Name:</label> -->
                        <input type="text" id="full_name" size="55" name="full_name" placeholder="Enter your full name" required>
                    </div>
            </div>
            <div class="reg_details_container">
                    <div class="inputBx" id="userpass">
                        <!-- <label for="upass">Enter User Password:</label> -->
                        <input type="password" id="upass" size="55" name="upass" placeholder="Enter your password" required>
                    </div>
                    <div class="inputBx" id="confirmuserpass">
                        <!-- <label for="confirmupass">Enter Confirm User Password:</label> -->
                        <input type="password" id="confirmupass" size="55" name="confirmupass" placeholder="Enter your password again to confirm" required>
                        <p class="error-msg" id="passerrormsg"></p>
                    </div>
            </div>
            <div class="reg_details_container">
                    <div class="inputBx" id="usermobile">
                        <!-- <label for="moble">Enter Mobile number:</lable> -->
                        <input type="text" id="mobile" size="55" name="mobile" placeholder="Enter your mobile number" required>
                        <p class="error-msg" id="mobileerrormsg"></p>
                    </div>
                    <div class="inputBx" id="useremailid">
                        <!-- <label for="email_id">Enter Email id:</label> -->
                        <input type="email" id="email_id" size="55" name="email_id" placeholder="Enter your email ID" required>
                        <p class="error-msg" id="emailerrormsg"></p>
                    </div>
            </div>
                    <div class="inputBx" id="useraddress">
                        <!-- <label for="address">Enter Address:</label> -->
                        <textarea id="address" name="address" rows="5" placeholder="Enter your address to get your delivery" required></textarea>
                    </div>
                    </div>
                    <div class="inputBx signup-button" id="signup">
                        <button type="submit">Sign Up</button>
                    </div>
                    <div id="form-message"></div>
        </form>
</div>




<!-- JavaScript Validation Script (Vanilla JS) -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
      const form = document.getElementById("registrationForm");

      form.addEventListener("submit", function(e) {
        // Clear any previous error messages
        document.getElementById('passerrormsg').style.display = 'none';
        document.getElementById('mobileerrormsg').style.display = 'none';

        let isValid = true;

        // Validate password and confirm password match
        const password = document.getElementById("upass").value;
        const confirmPassword = document.getElementById("confirmupass").value;
        if (password !== confirmPassword) {
          document.getElementById("passerrormsg").textContent = "Passwords do not match.";
          document.getElementById("passerrormsg").style.display = "block";
          isValid = false;
        }

        // Validate mobile number length (assuming exactly 10 digits)
        const mobile = document.getElementById("mobile").value.trim();
        // Check that the mobile number contains exactly 10 digits
        if (!/^\d{10}$/.test(mobile)) {
          document.getElementById("mobileerrormsg").textContent = "Mobile number must be exactly 10 digits.";
          document.getElementById("mobileerrormsg").style.display = "block";
          isValid = false;
        }

        // If validations fail, prevent the form submission
        if (!isValid) {
          e.preventDefault();
        }
      });
    });
    
    function showMessage(message, type) {
            const messageArea = document.getElementById('form-message');
            messageArea.textContent = message;
            messageArea.className = ` ${type}`; // Set class based on type
            messageArea.style.display = 'block'; // Show the message
        }
  </script>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $uname = $_POST["uname"];
    $full_name = $_POST["full_name"];
    $upass = $_POST["upass"];
    $mobile = $_POST["mobile"];
    $email_id = $_POST["email_id"];
    $address = $_POST["address"];

    // Flags to control errors
    $usernameTaken = false;
    $emailTaken = false;

    // Check the user name in the registration table if already taken
    $sql = "Select * from registration where uname='$uname'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $usernameTaken = true;
    } 

    // Check the user email ID in the registration table if already exists.
    $sql = "Select * from registration where email_id='$email_id'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $emailTaken = true;
    } 

    // If there are any errors, set error messages in the alert boxes
    if($usernameTaken || $emailTaken){

        $errorMessage = "";
        if($usernameTaken){
            echo "<script>showMessage('Username already exists!', 'error');</script>";
        }
        if($emailTaken){
            echo "<script>showMessage('Email already exists!', 'error');</script>";
        }
    }else if(!$usernameTaken && !$emailTaken){
        //SQL query to post data into database.
        $sql = "INSERT INTO `registration` (`uname`,`full_name`,`upass`,`mobile`,`email_id`,`address`)VALUES   ('$uname','$full_name','$upass','$mobile','$email_id','$address')";
        $result = mysqli_query($conn,$sql);
        if($result){
            //Set session variables 
            session_start();
            $_SESSION['uname']=$uname;
            $_SESSION['full_name']=$full_name;
            $_SESSION['upass']=$upass;
            $_SESSION['mobile']=$mobile;
            $_SESSION['email_id']=$email_id;
            $_SESSION['address']=$address;
            echo "<script>showMessage('Registration successful!', 'success');
            setTimeout(function() {
                window.location.href = 'login.php';
            }, 3000); // Redirect after 3 seconds
            </script>"; 
        }
        else{
            echo "<script>showMessage('Registration failed!', 'error')    ;
            </script>";
        }
    }
}
?>


            