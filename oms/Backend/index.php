<?php
    include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login - MedDrip Pharmacy</title>
    <link rel="stylesheet" href="index.css">
    <script>
            function validateform(event){    //function for input validation
                const admin_name =document.getElementById('adname').value;  //
                const admin_password = document.getElementById('adpass').value;
        
                    if(admin_name == '' && admin_password == ''){
                          alert('All fields are required');
                         event.preventDefault(); // Stops form from submission
                         return false;
                    }else if(admin_password.length !==15){
                          alert('Password length not matched ');
                          event.preventDefault();
                         return false;
                    }
                return true;
            }
        </script>
</head> 
<body>
    <header>
        <h1>Way to <strong> MedDrip Pharmacy </strong> admin dashboard</h1>
    </header>
    <main>
        <div>
            <form action="" method="post" class="login" onsubmit="return validateform(event)">
                <div class="inputBx" id="adminname">
                   <label for="name_pass">Enter admin name</label> 
                    <input type="text" name="admin_name" id="adname" required>
                </div>
                <div class="inputBx" id="apass">
                <label for="name_pass">Enter admin password</label>
                    <input type="password" name="apass" id="adpass" required>
                </div>
                <div class="inputBx" id="submit">
                    <input type="submit" id="submit" value="login">
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
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $admin_name = $_POST["admin_name"];
    $apass = $_POST["apass"];
    //SQL query to check data from database.
    $sql = "Select * from admin_info where admin_name='$admin_name' AND apass='$apass'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    //Verifying the data from database.
    if($num >= 1){
        //Set session variables
         session_start();
         $_SESSION['admin_name']=$admin_name;
         $_SESSION['apass']=$apass;
         $_SESSION['is_admin_logged_in'] = true;
        header("location:admin_dashboard.php");
    }
    else{
        echo "<script>alert('Invalid login credentials');</script>";
    }
}
?>
