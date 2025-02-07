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
    <title>View Products - View Categories</title>
    <link rel="stylesheet" href="add_categories.css">
</head>
<body>
    <div class="main">
        <div class="tble">
            <table>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                </tr>
                <?php
                // Fetch data from database
                $sql = "SELECT * FROM category";
                $result =  mysqli_query($conn,$sql);
                if($result && mysqli_num_rows($result) > 0){
                    // Output of each row
                    while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $row['category_id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
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
