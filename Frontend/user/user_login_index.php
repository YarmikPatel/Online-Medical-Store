<?php
    session_start();
    if(!isset($_SESSION['email_id'])){
        die('user not logged in. UID not found in session');
    }
    include('../../Backend/connection.php');
    include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Index</title>
    <link rel="stylesheet" href="product_catalogue.css">
</head>
<body>

    <div class="menu">
    <?php
            $sql = "SELECT p.pid, p.pname, p.descript, p.illeness, p.dosage_schedule, p.price, p.image, c.name FROM product p INNER JOIN category c ON p.category_id = c.category_id";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card">';
                        echo '<img src="../../Backend/image1/' . $row['image'] . '" alt="Product Image">';
                        echo '<div class="card-content">';
                            echo '<div class="category">' . $row['name'] . '</div>';
                            echo '<div class="product-name"><strong>Medicine:</strong>' . $row['pname'] . '</div>';
                            echo '<div class="product-description"><strong>Description:</strong>' . $row['descript'] . '</div>';
                            echo '<div class="price">₹' . $row['price'] . '</div>';
                            echo '<form method="POST">';
                            echo '<input type="hidden" name="pid" value="' . $row['pid'] . '">';
                            echo '<button type="submit" class="button">Add to Cart</button>';
                            echo '</form>';
                        echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No products found.</p>';
            }
        ?>
    </div>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pid = $_POST['pid'];
    $uid = $_SESSION['uid']; // Replace with the logged-in user ID from session

    // Check if the product is already in the cart
    $check_cart = "SELECT * FROM cart WHERE pid = $pid AND uid = $uid";
    $result = mysqli_query($conn, $check_cart);

    if (mysqli_num_rows($result) > 0) {
        // Update quantity if already in the cart
        $update_cart = "UPDATE cart SET qty = qty + 1 WHERE pid = $pid AND uid = $uid";
        mysqli_query($conn, $update_cart);
    } else {
        // Insert into cart
        $insert_cart = "INSERT INTO cart (pid, uid) VALUES ($pid, $uid)";
        mysqli_query($conn, $insert_cart);
    }

    header("Location: cart.php");
    exit;
}

?>