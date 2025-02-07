<?php 
include('admin_session.php');
include('connection.php'); 
include 'menu.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $pid = $conn->real_escape_string($_POST['pid']);
    $txt_update = $conn->real_escape_string($_POST['txt_update']);
    $selected_option = $_POST['dropdown_input'];        
    
   switch($selected_option){
        case "category_id":
            try{
            $sql = "UPDATE `product` SET category_id=$txt_update WHERE pid=$pid";
            $result = mysqli_query($conn, $sql);
                if($result){
                    $success_message= "updated successfull";
                }else{
                    $error_message ="cant update";
                }
            }catch (Exception $e){
                $error_message = "Category Id doesnt Exist!";
            } 
                break;
        case "pname":
            $sql = "UPDATE `product` SET pname='$txt_update' WHERE pid=$pid";
            $result = mysqli_query($conn, $sql);
                 if($result){
                    $success_message= "updated successfull";
                 }else{
                    $error_message ="cant update";
                 }   
                break;
        case "descript":
            $sql = "UPDATE `product` SET descript='$txt_update' WHERE pid=$pid";
            $result = mysqli_query($conn, $sql);
                if($result){
                    $success_message= "updated successfull";
                }else{
                    $error_message ="cant update";
                }
                break;
        case "illeness":
            $sql = "UPDATE `product` SET illeness='$txt_update' WHERE pid=$pid";
            $result = mysqli_query($conn, $sql);
                 if($result){
                    $success_message= "updated successfull";
                 }else{
                    $error_message ="cant update";
                }
                break;  
        case "dosage_schedule": 
            $sql = "UPDATE `product` SET dosage_schedule='$txt_update' WHERE pid=$pid";
            $result = mysqli_query($conn, $sql);
                if($result){
                    $success_message= "updated successfull";
                }else{
                    $error_message ="cant update";
                }
            break;
        case "price":
            $sql = "UPDATE `product` SET price=$txt_update WHERE pid=$pid";
            $result = mysqli_query($conn, $sql);
                if($result){
                    $success_message= "updated successfull";
                }else{
                    $error_message ="cant update";
                }
            break;
        case "stock":
            $sql = "UPDATE `product` SET stock=$txt_update WHERE pid=$pid";
            $result = mysqli_query($conn, $sql);
                if($result){
                    $success_message= "updated successfull";
                }else{
                    $error_message ="cant update";
                }
            break;           
        default: $error_message ="cant update" . $selected_option;
    }
    // Display alert with the selected dropdown value
    //echo "<script>alert('Selected value: $selected_option');</script>";
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
            </thead>
            <tbody>
            <?php
                // Fetch data from the database
                $sql = "SELECT * FROM product";
                $result = mysqli_query($conn, $sql);
                if($result && mysqli_num_rows($result) > 0) {
                    // Output each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['pid'] . "</td>";
                        echo "<td>" . $row['category_id'] . "</td>";
                        echo "<td>" . $row['pname'] . "</td>";
                        echo "<td>" . $row['descript'] . "</td>";
                        echo "<td>" . $row['illeness'] . "</td>";
                        echo "<td>" . $row['dosage_schedule'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row['stock'] . "</td>";
                        echo "<td><img src='image1/" . $row['image'] . "' alt='Product Image' width='50'></td>";
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
                Enter Product ID: <br>
                <input type="text" name="pid" id="pid" required>
        </div>
        <div class="dropdowninput">
            <select name="dropdown_input" id="update_clm_option">
                <option value="category_id">Category ID</option>
                <option value="pname">Product Name</option>
                <option value="descript">Description</option>
                <option value="illeness">Illness</option>
                <option value="dosage_schedule">Dosage Schedule</option>
                <option value="price">Price</option>
                <option value="stock">Stock</option>
            </select>
                <input type="text" name="txt_update" id="txt_update" required>  
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