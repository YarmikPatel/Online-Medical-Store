<?php
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
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;

    padding: 0;
}

/* Cart Container */
.cart-container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 10px auto;
    width: 80%;
    max-width: 1000px;
}

/* Product Info */
.product-info {
    font-size: 16px;
    margin: 10px 0;
}

.product-info strong {
    color: #2c3e50;
}

.product-button {
    background-color: #1abc9c;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.product-button:hover {
    background-color: #16a085;
}

/* Product Details */
#purchase-button {
    background-color: #3498db;
}

#purchase-button:hover {
    background-color: #2980b9;
}

/* Quantity Input */
.quantity-input {
    width: 60px;
    padding: 5px;
    margin-right: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
}

/* Delete Button */
#delete-item-button {
    background-color: transparent;
    border: none;
    cursor: pointer;
}

#delete-item-button img {
    width: 25px;
    height: 25px;
}

/* Empty Cart Message */
#empty-cart-message {
    margin: 279px;
    font-size: 18px;
    color: #e74c3c;
    text-align: center;
    /* margin-top: 50px; */
}

/* Form Styling */
form {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 10px;
}

form button {
    margin-left: 10px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .cart-container {
        width: 95%;
        padding: 15px;
    }

    .quantity-input {
        width: 50px;
    }

    .product-info {
        font-size: 14px;
    }
}

.main_cart_container {
margin-top: 84px;;
}

</style>
</head>
<body>
  
    <?php
        $uid = $_SESSION['uid']; // Replace with session user ID
        $sql = "SELECT pid, pname, price, qty, final_order 
                FROM cart WHERE uid = $uid";
        $result = mysqli_query($conn, $sql);
        if($result){
            if(mysqli_num_rows($result) > 0 ){
                echo '<div class="main_cart_container">';
                while ($row = $result->fetch_assoc()) {
                        echo '<div class="cart-container">';
                            echo '<a href="payment.php?pid=' . $row['pid'] . '"><button class="product-button" id="purchase-button">Buy Now</button></a>';
                            echo '<p class="product-info"><strong>Product:</strong> ' . $row['pname'] . '</p>';
                            echo '<p class="product-info"><strong>Price:</strong> ₹' . $row['price'] . '</p>';
                            echo '<p class="product-info"><strong>Quantity:</strong> ' . $row['qty'] . '</p>';
                            echo '<p class="product-info"><strong>SubTotal:</strong> ' . $row['final_order'] . '</p>';
                        ?>
                        <form action="" method="post">
                            <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                            <input type="text" name="qty" id="quantity-field" class="quantity-input">
                            <button type="submit" name="update_qty" id="update-quantity-button" class="product-button">Update Quantity</button>
                            <button type="submit" name="delete_cart_item" id="delete-item-button"><img src="../../Backend/image1/delete.png" alt="Delete Item" height="25px"></button>
                        </form>
                        <?php 
                        echo '</div>';
                }
                echo '</div>';
            }else{
                echo "<p id='empty-cart-message'>Your cart is empty</p>";
            }
        }else{
            echo "Server error";
        }
    ?>
</body>
</html>

<!-- Footer -->
<?php include('../footer.php'); ?>
<?php

if(isset($_POST['delete_cart_item'])){
    $pid = $_POST['pid'];
    $sql = "DELETE FROM cart where pid=$pid";
    mysqli_query($conn,$sql);
    echo '<script>location.href="cart.php"</script>';
}

if(isset($_POST['update_qty'])){
    $qty1 = $_POST['qty'];
    if(empty($qty1) || !is_numeric($qty1) || $qty1 <= 0){
        echo "<p>Please enter a valid quantity.</p>";
    } else {
        $pid = $_POST['pid'];
        $sql = "UPDATE cart SET qty=$qty1, final_order=price*$qty1 WHERE uid=$uid AND pid=$pid";
        $result = mysqli_query($conn,$sql);

        if($result){
            echo '<script>location.href="cart.php"</script>';
        }else{
            echo "Quantity can't be updated";
        }
    }
}
?> 
