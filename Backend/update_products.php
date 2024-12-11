<?php 
// include('admin_session.php');
include('connection.php'); 
// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script>
        async function validateform(event) {
            event.preventDefault();
            const category_id = document.getElementById('category_id').value;

            if(category_id){
                const valid_Id = await checkCategoryExists(category_id);
                if(!valid_Id){
                    alert('The provided category does not exists');
                    retrun;
                }
            }

            // If validation passes submit the form 
            document.getElementById('productform');
        }

        async function checkCategoryExists(category_id) {
            try{
                const response = await fetch('view_categories.php?category_id=${category_id}');
                const result = await respons.json();
                return result.exists;
            }catch(error){
                console.error("Error checking category:", error);
                return false;
            }
        }
    </script> -->
    <title>Product Management</title>
</head>
<body>
    <div class="main">
        <!-- Display Product Table -->
        <table border="1">
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
                        echo "<td><img src='" . $row['image'] . "' alt='Product Image' width='50'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No records found</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>

    <!-- Form to Fetch and Update Product -->
    <div class="form">
        <form id="productform" method="post" action="">
            <div class="notice">
                <p>Leave fields blank if not updating.</p>
            </div>
            <div class="inputBx">
                Enter Product ID:
                <input type="text" id="pid" name="pid" required>
            </div>
            <div class="inputBx">
                Enter Category ID:
                <input type="text" id="category_id" name="category_id">
            </div>
            <div class="inputBx">
                Enter Product Name:
                <input type="text" id="pname" name="pname">
            </div>
            <div class="inputBx">
                Enter Description:
                <input type="text" id="descript" name="descript">
            </div>
            <div class="inputBx">
                Enter Illness:
                <input type="text" id="illeness" name="illeness">
            </div>
            <div class="inputBx">
                Enter Dosage Schedule:
                <input type="text" id="dosage_schedule" name="dosage_schedule">
            </div>
            <div class="inputBx">
                Enter Price:
                <input type="text" id="price" name="price">
            </div>
            <div class="inputBx">
                Enter Stock:
                <input type="text" id="stock" name="stock">
            </div>
            <!-- <div class="inputBx">
                <input type="submit" name="fetch" value="Fetch Data">
            </div> -->
            <div class="inputBx">
                <input type="submit" name="update" value="Update Data">
            </div>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pid = $conn->real_escape_string($_POST['pid']);

        if (isset($_POST['fetch'])) {
            // Fetch data query
            $sql = "SELECT * FROM product WHERE pid =$pid";
            $result = mysqli_query($conn,$sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<script>
                    document.getElementById('pid').value = '{$row['pid']}';
                    document.getElementById('category_id').value = '{$row['category_id']}';
                    document.getElementById('pname').value = '{$row['pname']}';
                    document.getElementById('descript').value = '{$row['descript']}';
                    document.getElementById('illeness').value = '{$row['illeness']}';
                    document.getElementById('dosage_schedule').value = '{$row['dosage_schedule']}';
                    document.getElementById('price').value = '{$row['price']}';
                    document.getElementById('stock').value = '{$row['stock']}';
                </script>";
            } else {
                echo "<script>alert('No record found for Product ID: $pid');</script>";
                exit();
            }
        }   


        if (isset($_POST['update'])) {
            $category_id = $conn->real_escape_string($_POST['category_id']);
            $pname = $conn->real_escape_string($_POST['pname']);
            $sql = "UPDATE `product` SET category_id=$category_id, pname='$pname' WHERE pid=$pid";
            $result = mysqli_query($conn,$sql);
            // if ($result && mysqli_affected_rows($conn) > 0) {
            //     echo "<script>alert('Record Updated successfully');</script>"; 

            //     $relod = 1;
            //     if($relod == 1){
            //         echo "<script>window.location.reload();</script>";//for reload page
            //         exit();
            //     }
            // } else {
            //     echo "<script>alert('Record not updated successfully');</script>";
            // }

            if ($result) {
                if (mysqli_affected_rows($conn) > 0) {
                    echo "<script>alert('Record updated successfully');</script>"; 
                    echo "<script>window.location.reload();</script>";
                    header("location:manage_inventory.php");
                    // exit();
                } 
            } else {
                // Query execution failed
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        }
    }
    ?>
</body>
</html>
