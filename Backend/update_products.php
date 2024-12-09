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
                        <input type="text" id="pid" name="pid" required>
                    </div>
                    <div class="inputBx">
                        Enter category id (leave blank if not updating):
                        <input type="text" id="category_id" name="category_id">
                    </div>
                    <div class="inputBx">
                        Enter product name (leave blank if not updating):
                        <input type="text" id="pname" name="pname">
                    </div>
                    <div class="inputBx">
                        Enter product description (leave blank if not updating):
                        <input type="text" id="descript" name="descript">
                    </div>
                    <div class="inputBx">
                        Enter illeness (leave blank if not updating):
                        <input type="text" id="illeness" name="illeness">
                    </div>
                    <div class="inputBx">
                        Enter dosage schedule (leave blank if not updating):
                        <input type="text" id="dosage_schedule" name="dosage_schedule">
                    </div>
                    <div class="inputBx">
                        Enter product price (leave blank if not updating):
                        <input type="text" id="price" name="price">
                    </div>
                    <div class="inputBx">
                        Enter product stock (leave blank if not updating):
                        <input type="text" id="stock" name="stock">
                    </div>
                    <!-- <div class="inputBx">
                        Enter product image (leave blank if not updating):
                        <input type="text" id="image" name="image">
                    </div> -->
                    <div class="inputBx" id="update">
                        <input type="button" value="Update data">
                    </div>
                </form>
            </div>
        </div>
    </div>                
</body>
</html>

<?php 
    // Check if the form data is submitted
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $pid = $_POST['pid'];
        $category_id = !empty($_POST['category_id']) ? $_POST['category_id'] : null;
        $pname = !empty($_POST['pname']) ? $_POST['pname'] : null;
        $descript = !empty($_POST['descript']) ? $_POST['descript'] : null;
        $illeness = !empty($_POST['illeness']) ? $_POST['illeness'] : null;
        $dosage_schedule = !empty($_POST['dosage_schedule']) ? $_POST['dosage_schedule'] : null;
        $price = !empty($_POST['price']) ? $_POST['price'] : null;
        $stock = !empty($_POST['stock']) ? $_POST['stock'] : null;

        // Preparing the query dynamically based on inputs
        $fields = [];
        $params = [];
        $types = "";

        if($pid !== null){
            $fields[] = "pid='$pid'";
            $params[] = $pid;
            $types .= "i"; // i for integer 
        }
        
        if($category_id !== null){
            $fields[] = "category_id='$category_id'";
            $params[] = $category_id;
            $types .= "i"; // i for integer 
        }

        if($pname !== null){
            $fields[] = "pname='$pname'";
            $params[] = $pname;
            $types .= "s"; // i for integer 
        }

        if($descript !== null){
            $fields[] = "descript='$descript'";
            $params[] = $descript;
            $types .= "s"; // i for integer 
        }

        if($illeness !== null){
            $fields[] = "illeness='$illeness'";
            $params[] = $illeness;
            $types .= "s"; // i for integer 
        }

        if($dosage_schedule !== null){
            $fields[] = "dosage_schedule='$dosage_schedule'";
            $params[] = $dosage_schedule;
            $types .= "s"; // i for integer 
        }

        if($price !== null){
            $fields[] = "price='$price'";
            $params[] = $price;
            $types .= "i"; // i for integer 
        }

        if($stock !== null){
            $fields[] = "stock='$stock'";
            $params[] = $stock;
            $types .= "i"; // i for integer 
        }

        if(!empty($fields)){
            $params[] = $pid;
            $types .= "i";

            $sql = "Update `product` set " . implode(", ", $fields) . " where `pid`='$pid'";
            $stmt = $conn->prepare($sql);

            if($stmt){
                $stmt->bind_params($types, ...$params);
                if($stmt->execute()){
                    echo $stmt;
                    echo "Record updated successfully";
                }
                else{
                    echo "Error updating record " . $stmt->error; 
                }
            }else{
                echo "Error preparing statement " . $conn->error;
            }
        }else{
            echo "No fields to update";
        }
    }

?>