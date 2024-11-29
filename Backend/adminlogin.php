<?php
    include("connection.php");
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
        <h1>Way to MedPlus Pharmacy admin Dashboard</h1>
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