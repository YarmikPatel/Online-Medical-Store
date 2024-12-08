<?php
    include('admin_session.php');
    include('connection.php');

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $category_id = $conn->real_escape_string($_POST['category_id']);
        $name = $conn->real_escape_string($_POST['name']);

        //SQL query to post data into database.
        $sql = "INSERT INTO `category` (`category_id`,`name`) VALUES ('$category_id','$name')";
        $result = mysqli_query($conn,$sql);
        //Verifying the data from database.
        if($result){
             // Get the last inserted ID
            // $last_id = $conn->insert_id;

            // Set session variables
            $_SESSION['category_id'] = $category_id;
            $_SESSION['name'] = $name;
            // $_SESSION['user_email'] = $email;
            echo "Category records inserted successfully";
            header("location:save_product.php");
        }
        else{
            echo "Records not inserted successfully";
        }
    }

    // $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Category</title>
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