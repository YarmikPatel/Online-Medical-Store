<?php 
include('admin_session.php');
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
                <td>
                    product id
                </td>
                <td>
                    categor id
                </td>
                <td>
                    product name
                </td>
                <td>
                    description
                </td>
                <td>
                    illeness
                </td>
                <td>
                    dosage schedule
                </td>
                <td>
                    price
                </td>
                <td>
                    Stock
                </td>
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
                    <div class="inputbx">
                        Enter product id:
                        <input type="text" id="pid">
                    </div>
                    <div class="inputbx" id="categor_id">
                         Category id:
                        <input type="text" <?php echo $_session['category_id'] ?> name="category_id" id="category_id">
                    </div>
                     <div class="inputbx" id="pname">
                        Product name:
                        <input type="text" name="pname" id="pname">
                     </div>
                     <div class="inputbx" id="descript">
                     description:
                        <input type="text" name="descript" id="descript">
                     </div>
                     <div class="inputbx" id="illeness">
                     illeness :
                        <input type="text" name="illeness" id="illeness">
                     </div>
                     <div class="inputbx" id="dosage_schedule">
                     dosage_schedule:
                        <input type="text" name="dosage_schedule" id="dosage_schedule">
                     </div>
                     <div class="inputbx" id="price">
                     price :
                        <input type="text" name="price" id="price">
                     </div>
                     <div class="inputbx" id="Stock">
                     Stock:
                        <input type="text" name="Stock" id="Stock">
                     </div>
                     <!--<div class="inputbx" id="image">
                        image:
                        <input type="file" name="image" id="image">
                     </div>-->
                     <button>Find data</button>
                </form>
            </div>     
</body>
</html>

<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $pid = $_POST['pid'];

    //query for fatching data
    $sql = "select * from `product` where pid=$pid";
   $result =  mysqli_query($conn,$sql); 
 
   if($result && mysqli_num_rows($result) > 0){
            $category_id = $row['category_id'];

        
   }
}
?>