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
        /* Google Font */
@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;600&display=swap');

/* General Styles */
body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    overflow: hidden;
}

/* Floating Bubbles Effect */
.floating-shape {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    animation: floatAnimation 6s infinite ease-in-out;
}
.shape1 { width: 80px; height: 80px; top: 10%; left: 20%; }
.shape2 { width: 120px; height: 120px; top: 50%; left: 70%; }
.shape3 { width: 60px; height: 60px; bottom: 10%; right: 30%; }

@keyframes floatAnimation {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

/* Glassmorphism Signup Card */
.signup-container {
    position: relative;
    width: 400px;
    padding: 30px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    text-align: center;

    display: flex;
    flex-direction: column;  /* Stacks items vertically */
    align-items: center;
}

/* Interactive Inputs */
.inputBx {
    margin: 15px 0;
    text-align: left;
}
.inputBx input, .inputBx textarea {
    width: 100%;
    padding: 10px;
    border: none;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 5px;
    transition: 0.3s;
}
/* .inputBx input:focus, .inputBx textarea:focus {
    background: rgba(255, 255, 255, 0.5);
    transform: scale(1.05);
} */

/* Floating Signup Button */
.inputBx button {
    width: 100%;
    padding: 12px;
    border: none;
    background: linear-gradient(90deg, #ff6f61, #ff4757);
    color: white;
    font-size: 18px;
    border-radius: 50px;
    cursor: pointer;
    transition: 0.3s;
    animation: floatButton 3s infinite ease-in-out;
}
.signup-button {
    position: fixed;
    bottom: 20px;
    /*right: 20px;
    background-color: red;
    color: white;
    padding: 10px 20px;
    border-radius: 50px;
    font-size: 18px;
    cursor: pointer;*/
} 

@keyframes floatButton {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}


/* Error Messages (Inline) */
.error-msg {
    color: #e74c3c;
    font-size: 14px;
    display: none;
}

/* Toast Notifications */
.toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            display: none;
            z-index: 1000;
        }
        .toast.error { background-color: red; }
        .toast.success { background-color: green; }

        /* Modal Popup */
        .modal {
            position: fixed;
            top: 10px;  /* Moves to the top */
            left: 50%;
            transform: translateX(-50%); /* Centers horizontally */
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            z-index: 9999;
            font-weight: bold;
        }
        .modal.success { border: 2px solid green; }
        .modal.error { border: 2px solid red; }

    </style>
</head>
<body>
    <!-- Floating Shapes -->
    <div class="floating-shape shape1"></div>
    <div class="floating-shape shape2"></div>
    <div class="floating-shape shape3"></div>
<div class="signup-container">
    <div class="toast" id="toast"></div>
    <div class="modal" id="modal"></div>
    <div class="alert-box success modal" id="successalertbox"></div>
    <div class="alert-box error" id="erroralertbox"></div>
    
    <h1>User - Sign Up</h1>
        <form action="" method="post" id="registrationForm">
            <div class="inputBx" id="username">
                <label for="uname">Enter User Name:</label>
                <input type="text" id="uname" name="uname" required>
                <p class="error-msg" id="unameerrormsg"></p>
            </div>
            <div class="inputBx" id="fullname">
                <label for="full_name">Enter Full Name:</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>
            <div class="inputBx" id="userpass">
                <label for="upass">Enter User Password:</label>
                <input type="password" id="upass" name="upass" required>
            </div>
            <div class="inputBx" id="confirmuserpass">
                <label for="confirmupass">Enter Confirm User Password:</label>
                <input type="password" id="confirmupass" name="confirmupass" required>
                <p class="error-msg" id="passerrormsg"></p>
            </div>
            <div class="inputBx" id="usermobile">
                <label for="moble">Enter Mobile number:</lable>
                <input type="text" id="mobile" name="mobile" required>
                <p class="error-msg" id="mobileerrormsg"></p>
            </div>
            <div class="inputBx" id="useremailid">
                <label for="email_id">Enter Email id:</label>
                <input type="email" id="email_id" name="email_id" required>
                <p class="error-msg" id="emailerrormsg"></p>
            </div>
            <div class="inputBx" id="useraddress">
                <label for="address">Enter Address:</label>
                <textarea id="address" name="address" rows="3" required></textarea>
            </div>
            </div>
            <div class="inputBx signup-button" id="signup">
                <button type="submit">Sign Up</button>
            </div>
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
    function showToast(message, type) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.className = 'toast ' + type;
            toast.style.display = 'block';
            setTimeout(() => { toast.style.display = 'none'; }, 5000);
        }

        function showModal(message, type) {
            const modal = document.getElementById('modal');
            modal.textContent = message;
            modal.className = 'modal ' + type;
            modal.style.display = 'block';
            setTimeout(() => { modal.style.display = 'none'; }, 5000);
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

        echo "";

        $errorMessage = "";
        if($usernameTaken){
            echo "<script>showToast('Username already exists!', 'error');</script>";
        }
        if($emailTaken){
            echo "<script>showToast('Email already exists!', 'error');</script>";
        }
    }else if(!$usernameTaken && !$emailTaken){
        //SQL query to post data into database.
        $hashed_password = password_hash($upass, PASSWORD_BCRYPT);
        $sql = "INSERT INTO `registration` (`uname`,`full_name`,`upass`,`mobile`,`email_id`,`address`)VALUES   ('$uname','$full_name','$hashed_password','$mobile','$email_id','$address')";
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
            echo "<script>showModal('Registration successful!', 'success');
            setTimeout(function() {
                window.location.href = 'login.php';
            }, 3000); // Redirect after 3 seconds
            </script>"; 
        }
        else{
            echo "<script>showModal('Registration failed!', 'error')    ;
            </script>";
        }
    }
}
?>


            