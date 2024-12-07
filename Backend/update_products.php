<?php
include('admin_session.php');
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="main">
        <div class="form">
            <form method="post">
                <div class="inputBx" id="category_id">
                    Enter category id <br>
                    <input type="text" name="category_id" id="category_id">
                </div>
                <div class="inputBx" id="name">
                    Enter category name <br>
                    <input type="text" name="name" id="name">
                </div>
                <div class="inputBX" id="submit">
                    <input type="submit" value="Add category">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php

?>