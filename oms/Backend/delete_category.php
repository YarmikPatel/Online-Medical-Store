<?php 
include('admin_session.php');
include('connection.php'); 
include 'menu.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cid = $conn->real_escape_string($_POST['cid']);

    // Query to delete data
    $sql = "DELETE FROM category WHERE category_id = '$cid'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_affected_rows($conn) > 0) {
        $success_message = "Category Deleted";
    } else {
        $error_message = "Failed  to delete category";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleting Product</title>
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

        <div id="form-container" class="form-container">
                    <form method="post">
                        <div class="inputBx">
                    <label for="cid">Enter Category ID:</label>
                    <input type="text" id="cid" name="cid" required>
                </div>
                <div class="inputBx_button">
                <input type="submit" name="delete_category" value="Delete category">
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


