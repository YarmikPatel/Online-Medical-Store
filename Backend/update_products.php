<?php 
// include('admin_session.php');
include('connection.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="main">
        
        <table>
            <th>
                <td>product id</td>
                <td>categor id</td>
                <td>product name</td>
                <td>description</td>
                <td>illeness</td>
                <td>dosage schedule</td>
                <td>price</td>
                <td>Stock</td>
            </th>
            
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
           <div class="form">
                <form method="post">
                    <div class="inputBx">
                        Enter product id:
                        <input type="text" id="inputvalue" name="inputvalue" value="<?php echo isset($_POST['inputvalue']) ? ($_POST['inputvalue']) : ''; ?>" required>
                    </div>
                     <button type="submit" name="search">Search data</button>
                </form>
            </div>     
            <?php if (!empty($error)) {
        <p style="color:red;"><?php echo $error; ?></p>
     } ?>

    <?php if (!empty($success)) { 
        <p style="color:green;"><?php echo $success; ?></p>
     } ?>

    <?php
     if (!empty($data)) { 
        <h3>Edit User Details</h3>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="pid" value="<?php echo htmlspecialchars($data['pid']); ?>">

            <?php for ($i = 1; $i <= 7; $i++) { 
                <label for="field<?php echo $i; ?>">Field <?php echo $i; ?>:</label>
                <input type="text" id="field<?php echo $i; ?>" name="field<?php echo $i; ?>" value="<?php echo htmlspecialchars($data["field$i"]); ?>">
                <br><br>
             } ?>

            <label for="image">Current Image:</label><br>
            <img src="<?php echo htmlspecialchars($data['image']); ?>" alt="User Image" width="100"><br><br>
            <label for="image">Upload New Image:</label>
            <input type="file" id="image" name="image">
            <br><br>
            <button type="submit" name="update">Update</button>
        </form>
     } 
     ?>
</body>
</html>

<?php 
$result = null;
// $error = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['search'])){
        // Handling serach value
        $inputvalue = $_POST['inputvalue'];
        
        if(!empty($inputvalue)){
            $sql = "Select * from product where pid='$inputvalue'";
            $result =  mysqli_query($conn,$sql);
            
            if($result && mysqli_num_rows($result) > 0){
                $error = "No records found for the given input.";
            }
            else{
                $data = $result->fetch_assoc(); // Fetch the single result
            }
        }
        else{
            $error = "Please! Enter product id to search.";
        }
    }
    // elseif (isset($_POST['update'])) {
    //     // Handle update
    //     $id = $_POST['id'];
    //     $fieldsToUpdate = [];
    //     $params = [];
    //     $types = '';

    //     // Text values
    //     for ($i = 1; $i <= 7; $i++) {
    //         $field = $_POST["field$i"];
    //         if (!empty($field)) {
    //             $fieldsToUpdate[] = "field$i = ?";
    //             $params[] = $field;
    //             $types .= 's';
    //         }
    //     }

    //     // Image upload
    //     if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    //         $targetDir = "uploads/";
    //         $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    //         move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

    //         $fieldsToUpdate[] = "image = ?";
    //         $params[] = $targetFile;
    //         $types .= 's';
    //     }

    //     if (!empty($fieldsToUpdate)) {
    //         $params[] = $pid;
    //         $types .= 'i';
    //         $sql = "UPDATE users SET " . implode(", ", $fieldsToUpdate) . " WHERE id = '$inputvalue'";
    //         $stmt = $conn->prepare($sql);
    //         $stmt->bind_param($types, ...$params);

    //         if ($stmt->execute()) {
    //             $success = "Record updated successfully!";
    //         } else {
    //             $error = "Failed to update record.";
    //         }
    //     } else {
    //         $error = "No fields were updated.";
    //     }
    // }    
}
?>