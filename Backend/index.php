<?php
include ('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - MedDrip Pharmacy</title>
    <link rel="stylesheet" href="index.css">
    <script>
            function validateform(event){    //function for input validation
                const validcode =document.getElementById('acode').value;  //
        
                  if(validcode == ''){
                         alert('Field required');
                         event.preventDefault(); // Stops form from submission
                         return false;
                 }
            return true;
            }
</script>
</head>

<body>
    <header>
        <h1>Admin, welcome to our <strong>MedDrip Pharmacy</strong></h1>
    </header>
    <main>
        <h2>Admin verification</h2>
        <div>
            <form action="" method="post" class="verify" onsubmit="return validateform(event)">
                <div class="inputBx" id="admincode">
                    <input type="password" name="code" id="acode" placeholder="Enter admin code" required>
                </div>
                <div class="inputBx" id="submit">
                    <input type="submit" value="Verify passcode">
                </div>
            </form>
        </div>
    </main>
    <footer>
        <p>2024 of MedDrip. All rights reserved.<br>Created by Tirth Barot and Yarmik Kansagara.</p>
    </footer>
</body>
</html>

<?php
$login = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $code = $_POST["code"];
    //SQL query to check data from database.
    $sql = "Select * from admin_info where code='$code'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    //Verifying the data from database.
    if($num >= 1){
        $login = true;
         session_start();
        $_SESSION['code'] = $code;
        $_SESSION['is_admin_logged_in'] = true;
        $_SESSION['admin_last_activity'] = time();
        header("location:adminlogin.php");
    }
    else{
        echo "<script>alert('Invalid credentials');</script>";
    }
}
?>
