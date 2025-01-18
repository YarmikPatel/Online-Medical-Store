<?php 
include('admin_session.php');
include('connection.php'); 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $category_id = $_POST['category_id'];
    $cname = $_POST['cname'];

    if(!empty($category_id) && !empty($cname)){
        try{
            $sql = "INSERT INTO category VALUES('$category_id','$cname')";
            $result = $conn->query($sql); // execute the query

            if($result){
                $success_message = "Category added successfully!";
            }else{
                $error_message = "Failed to  add Category";
            }
        }catch (Exception $e){
            $error_message = "Error: Category ID Already Exist!!!";
        }
    }else{
        $error_message = "All field are required";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_categories.css">
    <title>Add Product - Category</title>
    <script>
        function toggleForm() {
            const formContainer = document.getElementById('form-container');
            const toggleButton = document.getElementById('toggle-button');

            if (formContainer.style.display === 'none' || formContainer.style.display === '') {
                formContainer.style.display = 'block';
                toggleButton.textContent = 'Hide Form';
            } else {
                formContainer.style.display = 'none';
                toggleButton.textContent = 'Show Form';
            }
        }
    </script>
</head>
<body>
    <div class="main">
    <?php
     if (isset($success_message)) echo "<p class='success'>$success_message</p>"; 
     ?>
    <?php
     if (isset($error_message)) echo "<p class='error'>$error_message</p>"; 
     ?>
       
    <table border="1">
            <tr>
                <th>Category ID</th>
                <th>Category Name</th>
            </tr>
            <?php
            try {
                // Fetch data from database
                $sql = "SELECT * FROM category";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    // Output each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['category_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No records found</td></tr>";
                }
            } catch (Exception $e) {
                echo "<tr><td colspan='2'>Error: " . $e->getMessage() . "</td></tr>";
            }
            ?>
            <!-- Form Container Row -->
            <tr id="form-container" class="form-container">
                <td colspan='2'>
                    <form method="post">
                        <div class="inputBx">
                            Enter category ID <br>
                            <input type="text" name="category_id" id="category_id" required>
                        </div>
                        <div class="inputBx">
                            Enter category name <br>
                            <input type="text" name="cname" id="cname" required>
                        </div>
                        <div class="inputBx">
                            <input type="submit" value="Add category">
                        </div>
                    </form>
                </td>
            </tr>
        </table>

        <!-- Toggle Button -->
        <!-- <button id="toggle-button" onclick="toggleForm()" style="padding: 10px 20px; background-color: #0bc05370; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Show Form
        </button> -->

        <button id="toggle-button" onclick="toggleForm()">
            Show Form
        </button>
    </div>
</body>
</html>
