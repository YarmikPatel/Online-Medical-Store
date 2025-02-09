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
</head>
<body>
    <!-- Floating Shapes -->
    <div class="floating-shape shape1"></div>
    <div class="floating-shape shape2"></div>
    <div class="floating-shape shape3"></div>
<div class="signup-container">
    <div class="toast" id="toast"></div>
    <div class="modal" id="modal"></div>
    <div class="alert-box success" id="successalertbox"></div>
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


            