<?php 
include('admin_session.php');
include('connection.php'); 
include 'menu.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = $conn->real_escape_string($_POST['pid']);

    // Query to delete data
    $sql = "DELETE FROM product WHERE pid = '$pid'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_affected_rows($conn) > 0) {
        $success_message = "Product deleted successfully!";
    } else {
        $error_message = "Product Id doesnt Exist";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
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
                <th>Product ID</th>
                <th>Category ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Illness</th>
                <th>Dosage Schedule</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
            </tr>
            
            <?php
                // Fetch data from the database
                $sql = "SELECT * FROM product";
                $result = mysqli_query($conn, $sql);
                if ($result && mysqli_num_rows($result) > 0) {
                    // Output of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['pid']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['category_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['pname']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['descript']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['illeness']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['dosage_schedule']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['stock']) . "</td>";
                        echo "<td><img src='image1/" . $row['image'] . "' alt='Product Image' width=100 height=100></td>";
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
                    <label for="pid">Enter Product ID:</labe>
                    <input type="text" id="pid" name="pid" required>
                </div>
                <div class="inputBx_button">
                                <input type="submit" name="delete_category" value="delete category">
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
