<?php
    // include('admin_session.php');
    include('connection.php');

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $category_id = $_POST['category_id'];
        $cname = $_POST['cname'];
    $image = NULL;

        //SQL query to post data into database.
        $sql = "UPDATE `category` SET name='$cname' WHERE category_id=$category_id";
        $result = mysqli_query($conn,$sql);
        //Verifying the data from database.
        if($result){
            echo "category records inserted successfully";
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
    <title>Add Product Details</title>
    <link rel="stylesheet" href="add_categories.css">
</head>
<body>
    <div class="main">

 <!-- Display Product Table -->
 <table>
            <tr>
                <th>Category ID</th>
                <th>Category Name</th>
            </tr>
            
            <?php
                // Fetch data from the database
                $sql = "SELECT * FROM Category";
                $result = mysqli_query($conn, $sql);
                if ($result && mysqli_num_rows($result) > 0) {
                    // Output of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['category_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No records found</td></tr>";
                }
            ?>
        </table>

    <div class="form">
        <form method="post">
                <div class="inputBx" id="category_id">
                    Enter category id <br>
                    <input type="text" name="category_id" id="category_id">
                </div>
                <div class="inputBx" id="category_name">
                    Enter category Name <br>
                    <input type="text" name="cname" id="cname">
                </div>
                <div class="inputBX" id="submit">
                    <input type="submit" value="Insert product details">
                </div>
            </form>
        </div>
    </div>
</body>
</html>