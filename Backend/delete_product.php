<?php 
include('admin_session.php');
include('connection.php'); 
include 'menu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="add_categories.css">
</head>
<body>
    <div class="main">
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
                        echo "<td><img src='" . htmlspecialchars($row['image']) . "' alt='Product Image' width='100'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No records found</td></tr>";
                }
            ?>
        </table>
    </div>

    <div class="form">
        <form method="post">
            <div class="inputbx">
                <label for="pid">Enter Product ID:</label>
                <input type="text" id="pid" name="pid" required>
            </div>
            <button type="submit">Delete Data</button>
        </form>
    </div>     
</body>
</html>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = $conn->real_escape_string($_POST['pid']);

    // Query to delete data
    $sql = "DELETE FROM product WHERE pid = '$pid'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Deleted successfully'); window.location.reload();</script>"; //for reload page
    } else {
        echo "<script>alert(' Product ID not found');</script>";
    }
}
?>
