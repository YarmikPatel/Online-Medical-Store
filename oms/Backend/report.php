<?php
include('admin_session.php');
include('connection.php');
include('menu.php');
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
        <p>this is a  history of delivered orders</p>
        <div class="tble">
            <table border="2">
                <tr>
                    <th>oid</th>
                    <th>uid</th>
                    <th>pid</th>
                    <th>order_date</th>
                    <th>Status</th>
                    <th>price</th>
                    <th>qty</th>
                    <th>total_amount</th>
                </tr>
                <?php
                // Fetch data from database
                $sql = "Select * from order_history WHERE status='delivered'";
                $result =  mysqli_query($conn,$sql);
                if($result && mysqli_num_rows($result) > 0){
                    // Output of each row
                    while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $row['oid'] . "</td>";
                    echo "<td>" . $row['uid'] . "</td>";
                    echo "<td>" . $row['pid'] . "</td>";
                    echo "<td>" . $row['order_date'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['qty'] . "</td>";
                    echo "<td>" . $row['total_amount'] . "</td>";
                    echo "</tr>";
                    }
                } else{
                    echo "<tr><td colspan='2'>No records found</td></tr>";
                }
                ?>
            </table>
        </div>


        <p>this is a history of cancelled orders</p>
        <div class="tble">
            <table border="2">
                <tr>
                    <th>oid</th>
                    <th>uid</th>
                    <th>pid</th>
                    <th>order_date</th>
                    <th>Status</th>
                    <th>price</th>
                    <th>qty</th>
                    <th>total_amount</th>
                </tr>
                <?php
                // Fetch data from database
                $sql = "Select * from order_history WHERE status='cancelled'";
                $result =  mysqli_query($conn,$sql);
                if($result && mysqli_num_rows($result) > 0){
                    // Output of each row
                    while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $row['oid'] . "</td>";
                    echo "<td>" . $row['uid'] . "</td>";
                    echo "<td>" . $row['pid'] . "</td>";
                    echo "<td>" . $row['order_date'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['qty'] . "</td>";
                    echo "<td>" . $row['total_amount'] . "</td>";
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