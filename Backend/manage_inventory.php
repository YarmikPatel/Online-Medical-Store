<?php
include('admin_session.php');
// include('connection.php');
$servername="localhost";
$username="root";
$password="";
$dbname="medical_store";

//create connection

$conn = new mysqli($servername,$username,$password,$dbname);

//check connection

if($conn->connect_error){
        die("commection failed :" .$conn->connect_error);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Inventory</title>
</head>
<body>
    <div>
        <div class="form">
            <form method="post">
                <div class="inputBX" id="pname">
                    Enter product name
                    <input type="text" name="pname" id="pname"><br>
                </div>
                <div class="inputBx" id="descript">
                    Enter product description
                    <input type="text" name="descript" id="descript"><br>
                </div>
                <div class="inputBx" id="illeness">
                    Enter prescription/illeness
                    <input type="text" name="illeness" id="illeness"><br>
                </div>
                <div class="inputBX" id="dosage_schedule">
                    Enter dosage schedule
                    <input type="text" name="dosage_schedule" id="dosage_schedule"><br>
                </div>
                <!-- <div class="inputBx" id="name">
                    Enter category of product
                    <input type="text" name="name" id="name"><br>
                </div> -->
                <div class="inputBx" id="price">
                    Enter product price
                    <input type="number" name="price" id="price"><br>
                </div>
                <div class="inputBx" id="stock">
                    Enter stock of product
                    <input type="number" name="stock" id="stock"><br>
                </div>
                <div class="inputBx" id="image">
                    Enter file path
                    <input type="file" name="image" id="image"><br><br>
                </div>
                <input type="submit" value="Add record">
                <input type="submit" value="Edit record">
                <input type="submit" value="Delete record">
            </form>
        </div>
    </div>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        

        // Handle image upload

        // Fetch session values
        $pname = $_POST['pname'];
        $descript = $_POST['descript'];
        $illeness = $_POST['illeness'];
        $dosage_schedule = $_POST['dosage_schedule'];
        // $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        
        //SQL query to post data into database.
        $sql = "INSERT INTO `product`(pname,descript,illeness,dosage_schedule,price,stock) values('$pname','$descript','$illeness','$dosage_schedule','$price','$stock')";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num >= 1){
            // Set session variables
            $_SESSION['pname'] = $pname;
            $_SESSION['descript'] = $descript;
            $_SESSION['illeness'] = $illeness;
            $_SESSION['dosage_schedule'] = $dosage_schedule;
            $_SESSION['price'] = $price;
            $_SESSION['stock'] = $stock;
            echo "Record successfully inserted into product table of database";
        }
        else{
            echo "Record are not inserted into product table of database";
        }


         //SQL query to post data into database.
         /*$sql = "INSERT INTO `category`(' ','name') values(' ','$name')";
         $result = mysqli_query($conn,$sql);
         $num = mysqli_num_rows($result);
         //Verifying the data from database.
         if($num >= 1){
            $_SESSION['name'] = $name;
             echo "Record successfully inserted into category table of database";
         }
         else{
             echo "Record are not inserted into category table of database";
         }*/
    }
?>