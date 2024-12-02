<?php
    
    include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login - MedPlus Pharmacy</title>
</head> 
<body>
    <header>
        <h1>Way to MedPlus Pharmacy admin dashboard</h1>
    </header>
    <main>
        <h4>
            Admin login
        </h4>
        <div>
            <form action="" method="post" class="login">
                <div class="inputBx" id="adminname">
                    Enter admin name
                    <input type="text" name="admin_name" id="adname">
                </div>
                <div class="inputBx" id="apass">
                    Enter admin pass
                    <input type="text" name="apass" id="adpass">
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
    //SQL query to post data into database.
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
        ?>
        <script>
            alert("Invalid Credentials");
        </script>
<?php
    }
}
?>
