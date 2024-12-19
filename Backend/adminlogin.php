<?php
    include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login - MedDrip Pharmacy</title>
    <link rel="stylesheet" href="">
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
        <h1>Way to MedDrip Pharmacy admin dashboard</h1>
    </header>
    <main>
        <h4>
            Admin login
        </h4>
        <div>
            <form action="" method="post" class="login" onsubmit="return validateform(event)">
                <div class="inputBx" id="adminname">
                    Enter admin name
                    <input type="text" name="admin_name" id="adname" required>
                </div>
                <div class="inputBx" id="apass">
                    Enter admin password
                    <input type="password" name="apass" id="adpass" required>
                </div>
                <div class="inputBx" id="login">
                    <input type="submit" value="login">
                </div>
            </form>
        </div>
    </main>
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
        header("location:admin_dashboard.php");
    }
    else{
        echo "<script>alert('Invalid login credentials');</script>";
    }
}
?>
