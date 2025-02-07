<?php 
include('admin_session.php');
include('connection.php'); 
include 'menu.php';

if(isset($_POST['update'])){
    $oid = $conn->real_escape_string($_POST['oid']);
    $selected_option = $_POST['dropdown_input'];        
    
    try{
    $sql = "UPDATE `order_history` SET status='$selected_option' WHERE oid=$oid";
    $result = mysqli_query($conn, $sql);
    
    if($result){
        if(mysqli_affected_rows($conn) > 0){
            $success_message= "updated successfull";
        }else{
        $error_message ="Order Id doesnt Exist";
        }
    }
    }catch (Exception $e){
        $error_message = "Please enter Order ID";
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
    <title>MedDrip Pharmacy - update Product</title>
    <script src="toggle-btn.js"></script>
    <style>
        .dropdowninput {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    margin-top: 20px;
}

.dropdowninput select,
.dropdowninput input {
    width: 250px;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.dropdowninput select {
    background-color: #fff;
    cursor: pointer;
}

.dropdowninput input {
    background-color: #f9f9f9;
}

.dropdowninput select:focus,
.dropdowninput input:focus {
    outline: none;
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
}
    </style>
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
    
                
    <!-- Fetch data and update the data-->
    <div id="form-container" class="form-container">
        <form method="post">
            <div class="inputBx">
                Enter Order ID: <br>
                <input type="text" name="oid" id="oid" required>
        </div>
        <div class="dropdowninput">
            Update status: 
            <select name="dropdown_input" id="update_clm_option">
                <option value="pending">pending</option>
                <option value="shipped">shipped</option>
                <option value="out for delivery">out for delivery</option>
                <option value="delivered">delivered</option>
                <option value="cancelled">cancelled</option>
            </select>
        </div>
        <div class="inputBx_button">
            <input type="submit" name="update" id="update" value="Update Data">
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