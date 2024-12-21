<?php
include('../Backend/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedPlus - User Sign Up</title>
    <style>
        /* Add styling for error messages */
        .error-msg {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Basic alert box styling */
        .alert-box {
            margin: 15px 0;
            padding: 10px 15px;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            width: 100%;
            margin: auto;
        }
        .success{
            background-color:'lightgreen';
            color:'green';
        }
        .error{
            background-color:'lightred';
            color:'red';
        }
    </style>
</head>
<body>
    <div class="alert-box success" id="successalertbox"></div>
    <div class="alert-box error" id="erroralertbox"></div>
    <h1>User - Sign up</h1>
    <div>
        <form action="" method="post">
            <div class="inputBx" id="username">
                Enter User Name:
                <input type="text" id="uname" name="uname" required>
                <p class="error-msg" id="unameerrormsg"></p>
            </div>
            <div class="inputBx" id="fullname">
                Enter Full Name:
                <input type="text" id="full_name" name="full_name" required>
            </div>
            <div class="inputBx" id="userpass">
                Enter User Password:
                <input type="password" id="upass" name="upass" required>
            </div>
            <div class="inputBx" id="confirmuserpass">
                Enter Confirm User Password:
                <input type="password" id="confirmupass" name="confirmupass" required>
                <p class="error-msg" id="passerrormsg"></p>
                 <!-- Error Messages -->
                <ul id="errorContainer" class="error-msg"></ul>
            </div>
            <div class="inputBx" id="usermobile">
                Enter Mobile number:
                <input type="text" id="mobile" name="mobile" required>
                <p class="error-msg" id="mobileerrormsg"></p>
            </div>
            <div class="inputBx" id="useremailid">
                Enter Email id:
                <input type="text" id="email_id" name="email_id" required>
                <p class="error-msg" id="emailerrormsg"></p>
            </div>
            <div class="inputBx" id="useraddress">
                Enter Address:
                <input type="Textarea" id="address" name="address" required>
            </div>
            <div class="inputBx" id="signup">
                <button type="submit">Sign Up</button>
            </div>
        </form>
    </div>

    <script src="user_registration.php"></script>
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

    // Display error message 
    if($usernameTaken){
        // echo "<script>document.getElementById('emailerrormsg').textContent = 'An Account with email is already exists.';</script>";
        echo "<script>
        localStorage.setItem('unameError', 'The username is already taken. Please choose a different one.');
        </script>";
    }else{
        // echo "<script>document.getElementById('emailerrormsg').textContent = '';</script>";
        echo "<script>
        localStorage.setItem('emailError', 'An account with this email already exists.');
        </script>";
    }

    if($emailTaken){
        echo "<script>document.getElementById('unameerrormsg').textContent = 'The username is already taken Please choose a different one.';</script>";
    }else{
        echo "<script>document.getElementById('unameerrormsg').textContent = '';</script>";
    }

    // If no errors, proceed with registration
    if(!$usernameTaken && !$emailTaken){
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
            echo "<script>document.getElementById('successalertbox').textContent = 'Registration successful.';
            setTimeout(function() {
                window.location.href = 'login.php';
            }, 3000); // Redirect after 3 seconds
            </script>"; 
        }
        else{
            echo "<script>document.getElementById('erroralertbox').textContent = 'Registration unsuccessful';</script>";
        }
    }
}
?>
