<?php

include ('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - MedPlus Pharmacy</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Admin, welcome to our <strong>MedPlus Pharmacy</strong></h1>
    </header>
    <main>
        <h2>Admin verification</h2>
        <div>
            <form action="" method="post" class="verify">
                <div class="inputBx" id="admincode">
                    Enter admin code
                    <input type="text" name="code" id="acode">
                </div>
                <div class="inputBx" id="submit">
                    <input type="submit" value="Verify passcode">
                </div>
            </form>
        </div>
    </main>
    <footer>
        <p>Copyright &copy; 2024 of MedPlus. All rights reserved.<br>Created by Tirth Barot and Yarmik Kansagara.</p>
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
        session_start();
        $_SESSION['code'] = $code;
        $_SESSION['is_admin_logged_in'] = true;
        header("location:adminlogin.php");
    }
    else{
        ?>
        <script>
            alert("Invalid Credentials");
        </script>
<?php
    }
}
?>
