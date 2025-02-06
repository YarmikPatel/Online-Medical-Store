<?php
    include('admin_session.php');
    include('connection.php');

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $category_id = $_POST['category_id'];
        $cname = $_POST['cname'];
        $success_message = null;
        $error_message =  null;

        //SQL query to post data into database.
        $sql = "UPDATE `category` SET name='$cname' WHERE category_id=$category_id";
        $result = mysqli_query($conn,$sql);
        //Verifying the data from database.
        if($result){
            if (mysqli_affected_rows($conn) > 0) { // Check if any rows were updated
                $success_message = "Category updated successfully!";
            } else {
                $error_message = "Category id doesn't Exist!";
            }
        }
        else{
            $error_message = "Failed to  Update Category";
        }
    }

    // $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category Details</title>
    <link rel="stylesheet" href="add_categories.css">
    <script src="toggle-btn.js"></script>
</head>
<body>
    <div class="main">
        <?php
        if (isset($success_message)) echo "<p class='success'>$success_message</p>"; 
        ?>
        <?php
        if (isset($error_message)) echo "<p class='error'>$error_message</p>"; 
        ?>
        
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
                    echo "<tr><td colspan='2'>No records found</td></tr>";
                }
            ?>
        </table>

        <div id="form-container" class="form-container">
                    <form method="post">
                        <div class="inputBx">
                            Enter category ID <br>
                            <input type="text" name="category_id" id="category_id" required>
                        </div>
                        <div class="inputBx">
                            Enter category name <br>
                            <input type="text" name="cname" id="cname">
                        </div>
                        <div class="inputBx_button">
                                <input type="submit" name="add_category" value="Update category">
                        </div>
                    </form>
        </div>

        <!-- Toggle Button -->
        <button id="toggle-button" onclick="toggleForm()">
            Show Form
        </button>
    </div>
</body>
</html>