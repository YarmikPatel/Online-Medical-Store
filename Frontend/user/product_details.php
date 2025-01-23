<?php
    include('../../Backend/connection.php');
    include 'navbar.php';

// Get the product ID from the URL
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details from the database
    $sql = "SELECT p.pname, p.descript, p.price, p.image, c.name 
            FROM product p 
            INNER JOIN category c ON p.category_id = c.category_id 
            WHERE p.pid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $row = $result->fetch_assoc()) {
        // Display product details
        echo '<h1>' . $row['pname'] . '</h1>';
        echo '<img src="../Backend/image1/' . $row['image'] . '" alt="Product Image">';
        echo '<p><strong>Category:</strong> ' . $row['name'] . '</p>';
        echo '<p><strong>Description:</strong> ' . $row['descript'] . '</p>';
        echo '<p><strong>Price:</strong> ₹' . $row['price'] . '</p>';
    } else {
        echo '<p>Product not found.</p>';
    }
} else {
    echo '<p>No product selected.</p>';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedDrip Pharmacy</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>
</html>