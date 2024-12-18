<?php
// Include the connection file
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];

    try {
        // Prepare and bind SQL statement to prevent SQL injection
        $sql = "INSERT INTO `category` (`category_id`, `name`) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $category_id, $name);
        $execute_value = $stmt->execute();
        // Execute the query
        if ($execute_value > 0) {
            echo "<script>alert('Category records inserted successfully');</script>";
        } else {
            echo "<script>alert('Records not inserted successfully');</script>";
        }

        // Close the prepared statement
        $stmt->close();
    } catch (Exception $e) {
        echo "<script>alert('Error: Category id already exist!');</script>";
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
</head>
<body>
    <div class="main">
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
        </table>

        <div class="form">
            <form method="post">
                <div class="inputBx">
                    Enter category ID <br>
                    <input type="text" name="category_id" id="category_id" required>
                </div>
                <div class="inputBx">
                    Enter category name <br>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="inputBx">
                    <input type="submit" value="Add category">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
