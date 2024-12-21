<?php 
// include('admin_session.php');
include('connection.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="add_categories.css">
</head>
<body>
    <div class="main">
        <!-- Display Product Table -->
        <table border="1">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Quntity</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // Fetch data from the database
                $sql = "SELECT * FROM order_history";
                $result = mysqli_query($conn, $sql);
                if($result && mysqli_num_rows($result) > 0) {
                    // Output each row
                    while($row = $result->fetch_assoc()) {
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
                } else {
                    echo "<tr><td colspan='9'>No records found</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
                
    <!-- Fetch data and update the data-->
  <div class="update_data">
    <form method="post" action="">
        <div class="inputbx">
            Enter Order ID:
                <input type="text" name="oid" id="oid" required>
        </div>
        <div class="dropdowninput">
              change Order Status  &nbsp;&nbsp;
            <select name="dropdown_input" id="update_clm_option">
                <option value="pending">pending</option>
                <option value="shipped">shipped</option>
                <option value="out for delivery">out for delivery</option>
                <option value="delivered">delivered</option>
                <option value="cancelled">cancelled</option>
            </select>
        <div class="inputbx">
            <input type="submit" name="update" id="update" value="Update Data">
        </div>
    </form>
  </div>

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $oid = $conn->real_escape_string($_POST['oid']);
            $selected_option = $_POST['dropdown_input'];        
            
////////////////////////
$sql = "UPDATE `order_history` SET status='$selected_option' WHERE oid=$oid";
$result = mysqli_query($conn, $sql);
    if($result){
        if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('updated successfully'); window.location.reload(); </script>";
        }
    }else{
        echo "<script>alert('cant update');</script>";
    }
}
//////////////////
    ?>
</body>
</html>