<?php
    session_start();
    if(!isset($_SESSION['uid'])){
        die('user not logged in. UID not found in session');
    }
    include('../../Backend/connection.php');
    include 'navbar.php';
    echo "<script>alert(".$_SESSION['user_name'].");</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Index</title>
   
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
    }

    .menu {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        padding: 20px;
        margin-top: 6%;
    }

    .card {
        width: 300px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    }

    .card img {
        width: 100%;
        height: 200px; /* Fixed height for consistent display */
        object-fit: contain; /* Ensures the entire image fits within the area */
        background-color: #f0f0f0; /* Optional: Add a light background for empty space */
    }

    .card-content {
        padding: 15px;
        text-align: left;
    }

    .category {
        font-size: 14px;
        color: #888;
        margin-bottom: 5px;
    }

    .product-name {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .product-description {
        font-size: 14px;
        color: #555;
        margin-bottom: 10px;
    }

    .price {
        font-size: 16px;
        font-weight: bold;
        color: #00b894;
        margin-bottom: 10px;
    }

    .button {
        display: inline-block;
        padding: 10px 15px;
        background-color: #00b894;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .button:hover {
        background-color: #01966c;
    }

    
</style>

</head>
<body>

    <div class="menu">
    <?php
            $sql = "SELECT p.pid, p.pname, p.descript, p.illeness, p.dosage_schedule, p.price, p.image, c.name FROM product p INNER JOIN category c ON p.category_id = c.category_id ORDER BY RAND()";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<a href="product_details.php?pid=' . $row['pid'] . '" style="text-decoration: none; color: inherit;">';
                    echo '<div class="card">';
                        echo '<img src="../../Backend/image1/' . $row['image'] . '" alt="Product Image">';
                        echo '<div class="card-content">';
                            echo '<div class="category">' . $row['name'] . '</div>';
                            echo '<div class="product-name"><strong>Medicine:</strong>' . $row['pname'] . '</div>';
                            echo '<div class="product-description"><strong>Description:</strong>' . $row['descript'] . '</div>';
                            echo '<div class="price">₹' . $row['price'] . '</div>';
                            echo '<form method="POST">';
                            echo '<input type="hidden" name="pid" value="' . $row['pid'] . '">';
                            echo '<input type="hidden" name="pname" value="' . $row['pname'] . '">';
                            echo '<input type="hidden" name="image" value="' . $row['image'] . '">';
                            echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                            echo '<button type="submit" class="button">Add to Cart</button>';
                            echo '</form>';
                        echo '</div>';
                    echo '</div>';
                    echo '</a>';
                }
            } else {
                echo '<p>No products found.</p>';
            }
        ?>
    </div>
    <!-- Footer -->
    <?php include('../footer.php'); ?>
    
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $uid = $_SESSION['uid']; // Replace with the logged-in user ID from session

    // Check if the product is already in the cart
    $check_cart = "SELECT * FROM cart WHERE pid = $pid AND uid = $uid";
    $result = mysqli_query($conn, $check_cart);

    if (mysqli_num_rows($result) > 0) {
        // Update quantity if already in the cart
        $update_cart1 = "UPDATE cart SET qty = qty + 1 WHERE pid = $pid AND uid = $uid";
        mysqli_query($conn, $update_cart1);
        $update_cart2 = "UPDATE cart SET final_order = price * qty WHERE pid = $pid AND uid = $uid";
        mysqli_query($conn, $update_cart2);
    } else {
        // Insert into cart
        $final_order = $price * 1;
        $insert_cart = "INSERT INTO `cart` (`uid`, `pid`, `pname`, `image`, `price`,`qty`,`final_order`) VALUES ('$uid', '$pid', '$pname', '$image', '$price','1','$final_order')";
        mysqli_query($conn, $insert_cart);
    }

    // header("Location: cart.php");
    exit;
}
?>