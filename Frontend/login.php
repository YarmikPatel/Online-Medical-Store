<?php
include('../Backend/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login form</title>
</head>
<body>

<!-- Loging form that take email id and password -->
    <div class="login_form">
        <form class="login" action="" method="post">
        <div class="email_id">
            <P>Enter Email ID</P>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="pass">
            <p>Enter Password</p>
            <input type="password" name="pass" id="pass" required>
        </div>
        <div class="check_data">
            <input type="submit" value="Login" id="check_data">
        </div>
        <div class="registration">
            <a href="user_registration.php">NEW USER?</a>
        </div>
        </form>
    </div>

    <!-- check email id and password for Loging -->
    <?php 
         if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $conn->real_escape_string($_POST['email']);
            $pass = $conn->real_escape_string($_POST['pass']);
           
            $sql = "SELECT * FROM `registration` WHERE upass='$pass' and email_id='$email'";
            $result = mysqli_query($conn,$sql);

            if($result && mysqli_num_rows($result) > 0){
               echo "<script>alert('Loging successfuly...');</script>";
               header("Location: user/user_login_index.php");  
            }else{
                echo "<script>alert('Invalid Credentials');</script>";
            }
         }
    ?>
</body>
</html>