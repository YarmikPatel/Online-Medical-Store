<?php
include('../Backend/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedPlus - User Sign Up</title>
</head>
<body>
    <h1>User - Sign up</h1>
    <div>
        <form action="" method="post">
            <div class="inputBx" id="username">
                Enter User Name:
                <input type="text" id="uname" name="uname">
            </div>
            <div class="inputBx" id="fullname">
                Enter Full Name:
                <input type="text" id="full_name" name="full_name">
            </div>
            <div class="inputBx" id="userpass">
                Enter User Password:
                <input type="password" id="upass" name="upass">
            </div>
            <div class="inputBx" id="userpass">
                Enter Confirm User Password:
                <input type="password" id="upass" name="upass">
            </div>
            <div class="inputBx" id="userpass">
                Enter Mobile number:
                <input type="text" id="upass" name="upass">
            </div>
            <div class="inputBx" id="userpass">
                Enter Email id:
                <input type="text" id="upass" name="upass">
            </div>
            <div class="inputBx" id="userpass">
                Enter Address:
                <input type="Textarea" id="upass" name="upass">
            </div>
        </form>
    </div>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $admin_name = $_POST["admin_name"];
    $admin_name = $_POST["admin_name"];
    $admin_name = $_POST["admin_name"];
    $admin_name = $_POST["admin_name"];
    $apass = $_POST["apass"];
    //SQL query to post data into database.
    $sql = "Select * from admin_info where admin_name='$admin_name' AND apass='$apass'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    //Verifying the data from database.
    if($num >= 1){
        //Set session variables
        // session_start();
        // $_SESSION['admin_name']=$admin_name;
        // $_SESSION['apass']=$apass;
        header("location:admin_dashboard.php");
    }
    else{
        echo "<script>alert('Invalid login credentials');</script>";
    }
}
?>
