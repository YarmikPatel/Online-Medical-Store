<?php
include('admin_session.php');
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products - View Categories</title>
    <link rel="stylesheet" href="add_categories.css">
</head>
<body>
    <div class="main">
        <div class="tble">
            <table>
                <tr>
                    <th>Product ID</th>
                    <th>Category ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Illeness</th>
                    <th>Dosage Schedule</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                </tr>
                <?php
                // Fetch data from database
                $sql = "Select * from product";
                $result =  mysqli_query($conn,$sql);
                if($result && mysqli_num_rows($result) > 0){
                    // Output of each row
                    while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $row['pid'] . "</td>";
                    echo "<td>" . $row['category_id'] . "</td>";
                    echo "<td>" . $row['pname'] . "</td>";
                    echo "<td>" . $row['descript'] . "</td>";
                    echo "<td>" . $row['illeness'] . "</td>";
                    echo "<td>" . $row['dosage_schedule'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['stock'] . "</td>";
                    echo "<td><img src='" . $row['image'] . "' alt='Product Image'></td>";
                    echo "</tr>";
                    }
                } else{
                    echo "<tr><td colspan='2'>No records found</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>