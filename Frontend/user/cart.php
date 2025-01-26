<?php
session_start();
    include('../../Backend/connection.php');
    include('navbar.php');
if (!isset($_SESSION['uid'])) {
    die('User not logged in. UID not found in session.');
}
$uid = $_SESSION['uid'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
    <style>
        ul li a {
            color: #1abc9c;
        }
    </style>
    <script>
        function text_null(){
            document.getElementById('qty').value = NULL;
        }
    </script>
</head>
<body>
    <?php
        $uid = $_SESSION['uid']; // Replace with session user ID
        $sql = "SELECT pid,pname, price, qty, final_order 
                FROM cart WHERE uid = $uid";
        $result = mysqli_query($conn, $sql);
        if($result){
            if(mysqli_num_rows($result) > 0 ){
                while ($row = $result->fetch_assoc()) {
                    echo '<div>';
                        echo '<p><strong>Product:</strong> ' . $row['pname'] . '</p>';
                        echo '<p><strong>Price:</strong> ₹' . $row['price'] . '</p>';
                        echo '<p><strong>Quantity:</strong> ' . $row['qty'] . '</p>';
                        echo '<p><strong>SubTotal:</strong> ' . $row['final_order'] . '</p>';
                        ?>
                        <form action="" method="post">
                        <input type="hidden" name="pid" id="pid" value="<?php echo $row['pid']; ?>">
                        <input type="text" name="qty" id="qty">
                        <button type="submit" name="update_qty" id="update_qty" onclick="text_null()">Add Quentity</button>
                        <button type="submit" name="delete_cart_item" id="delete_qty"><img src="../../Backend/image1/delete.png" alt="Delete Item"></button>
                        </form>
                        <?php 
                        echo '<hr>';
                        echo '</div>';
                }
            }else{
                echo "Your cart is empty";
            }
        }else{
            echo "Server error";
        }
    ?>
</body>
</html>

<?php


if(isset($_POST['delete_cart_item'])){
    $pid = $_POST['pid'];
    $sql = "DELETE FROM cart where pid=$pid";
    mysqli_query($conn,$sql);
    echo '<script>location.href="cart.php"</script>';
}


if(isset($_POST['update_qty'])){
    $qty1 = $_POST['qty'];
    $pid = $_POST['pid'];
    $sql = "UPDATE cart SET qty=$qty1 WHERE uid=$uid AND pid=$pid";
    $result = mysqli_query($conn,$sql);

    if($result){
        echo '<script>location.href="cart.php"</script>';
    }else{
        echo "Quentity can't updated";
    }
}
?>