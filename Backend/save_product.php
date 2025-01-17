<?php
    include('admin_session.php');
    include('connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pid = $_POST['pid'];
        $category_id = $_POST['category_id'];
        $pname = $_POST['pname'];
        $descript = $_POST['descript'];
        $illeness = $_POST['illeness'];
        $dosage_schedule = $_POST['dosage_schedule'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        // Handle image upload
        $target_dir = "image1/"; // Folder to store uploaded images
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a real image
        if (isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] != "") {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // If everything is ok, try to upload file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // SQL query to insert data into the database
                $sql = "INSERT INTO `product` (`pid`, `category_id`, `pname`, `descript`, `illeness`, `dosage_schedule`, `price`, `stock`, `image`) 
                        VALUES ('$pid', '$category_id', '$pname', '$descript', '$illeness', '$dosage_schedule', '$price', '$stock', '$target_file')";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "Product records inserted successfully.";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Details</title>
    <link rel="stylesheet" href="add_categories.css">
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
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['pid'] . "</td>";
                        echo "<td>" . $row['category_id'] . "</td>";
                        echo "<td>" . $row['pname'] . "</td>";
                        echo "<td>" . $row['descript'] . "</td>";
                        echo "<td>" . $row['illeness'] . "</td>";
                        echo "<td>" . $row['dosage_schedule'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row['stock'] . "</td>";
                        echo "<td><img src='" . $row['image'] . "' alt='Product Image' width=100 height=100></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No records found</td></tr>";
                }
            ?>
            </tbody>
        </table>

        <div class="form">
            <form method="post" enctype="multipart/form-data">
                <div class="inputBx" id="pid">
                    Enter product id <br>
                    <input type="text" name="pid" id="pid">
                </div>
                <div class="inputBx" id="category_id">
                    Enter category id <br>
                    <input type="text" name="category_id" id="category_id">
                </div>
                <div class="inputBx" id="pname">
                    Enter product name <br>
                    <input type="text" name="pname" id="pname">
                </div>
                <div class="inputBx" id="descript">
                    Enter product description <br>
                    <input type="text" name="descript" id="descript">
                </div>
                <div class="inputBx" id="illeness">
                    Enter prescription/illness related to product <br>
                    <input type="text" name="illeness" id="illeness">
                </div>
                <div class="inputBx" id="dosage_schedule">
                    Enter dosage schedule <br>
                    <input type="text" name="dosage_schedule" id="dosage_schedule">
                </div>
                <div class="inputBx" id="price">
                    Enter product price <br>
                    <input type="text" name="price" id="price">
                </div>
                <div class="inputBx" id="stock">
                    Enter product stock <br>
                    <input type="text" name="stock" id="stock">
                </div>
                <div class="inputBx" id="image">
                    Upload product image <br>
                    <input type="file" name="image" accept="image/*" id="image">
                </div>
                <div class="inputBX" id="submit">
                    <input type="submit" value="Insert product details">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
