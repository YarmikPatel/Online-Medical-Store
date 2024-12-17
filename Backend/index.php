<?php

include ('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - MedDrip Pharmacy</title>
    <link rel="stylesheet" href="styles.css">
    <script>
            function validateform(event){    //function for input validation
                const validcode =document.getElementById('acode').value;  //
        
                  if(validcode == ''){
                         alert('Field required');
                         event.preventDefault(); // Stops form from submission
                         return false;
                 }else if(validcode.length !==8) {
                          alert('code must be of 8 characters ');
                          event.preventDefault();
                         return false;
                }
            return true;
            }
</script>
</head>

<body>
    <header>
        <h1>Admin, welcome to our <strong>MedPlus Pharmacy</strong></h1>
    </header>
    <main>
        <h2>Admin verification</h2>
        <div>
            <form action="" method="post" class="verify" onsubmit="return validateform(event)">
                <div class="inputBx" id="admincode">
                    Enter admin code
                    <input type="password" name="code" id="acode" require>
                </div>
                <div class="inputBx" id="submit">
                    <input type="submit" value="Verify passcode">
                </div>
            </form>
        </div>
    </main>
    <footer>
        <p>2024 of MedPlus. All rights reserved.<br>Created by Tirth Barot and Yarmik Kansagara.</p>
    </footer>
</body>
</html>

<?php
$login = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $code = $_POST["code"];
    //SQL query to post data into database.
    $sql = "Select * from admin_info where code='$code'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    //Verifying the data from database.
    if($num >= 1){
        $login = true;
        // session_start();
        // $_SESSION['code'] = $code;
        // $_SESSION['is_admin_logged_in'] = true;
        // $_SESSION['admin_last_activity'] = time();
        header("location:adminlogin.php");
    }
    else{
        echo "<script>alert('Invalid credentials');</script>";
    }
}
?>
