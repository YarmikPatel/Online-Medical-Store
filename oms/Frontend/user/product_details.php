<?php
// Start session and include dependencies
session_start();
include('../../Backend/connection.php');
include 'navbar.php';

// Validate and retrieve product ID
if (!isset($_GET['pid']) || !is_numeric($_GET['pid'])) {
    die('<p>No product selected or invalid product ID.</p>');
}
$product_id = $_GET['pid'];

// Fetch product details securely
$sql = "SELECT pname, descript, illeness, dosage_schedule, price, stock, image FROM product WHERE pid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if product exists
if (!$result || !$row = $result->fetch_assoc()) {
    die('<p>Product not found.</p>');
    // Bind the product ID to the query
    $stmt->bind_param("i", $product_id);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the product exists
    if ($result && $row = $result->fetch_assoc()) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo htmlspecialchars($row['pname']); ?> - MedDrip Pharmacy</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f9f9f9;
                }
                .container1 {
                    max-width: 1200px;
                    margin: 105px auto;
                    padding: 20px;
                    background: #fff;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    display: flex;
                    flex-wrap: wrap;
                    gap: 20px;
                }
                .product-image {
                    flex: 1 1 40%;
                    text-align: center;
                }
                .product-image img {
                    max-width: 100%;
                    height: auto;
                    border-radius: 10px;
                }
                .product-details {
                    flex: 1 1 55%;
                }
                .product-details h1 {
                    color: #2c3e50;
                    font-size: 28px;
                    margin-bottom: 10px;
                }
                .product-details p {
                    font-size: 16px;
                    line-height: 1.6;
                    color: #555;
                    margin: 10px 0;
                }
                .product-details p strong {
                    color: #2c3e50;
                }
                .product-details .price {
                    font-size: 24px;
                    color: #00b894;
                    margin: 20px 0;
                }
                .product-details .stock {
                    font-size: 18px;
                    color: #e74c3c;
                }
                .product-details .stock.in-stock {
                    color: #27ae60;
                }
                .add-to-cart {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #00b894;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                    font-size: 16px;
                    transition: background-color 0.3s ease;
                }
                .add-to-cart:hover {
                    background-color: #01966c;
                }
            </style>
        </head>
        <body>
            <div class="container1">
                <!-- Product Image -->
                <div class="product-image">
                    <img src="../../Backend/image1/<?php echo htmlspecialchars($row['image']); ?>" alt="Product Image">
                </div>

                <!-- Product Details -->
                <div class="product-details">
                    <h1><?php echo htmlspecialchars($row['pname']); ?></h1>
                    <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($row['descript'])); ?></p>
                    <p><strong>Illness:</strong> <?php echo htmlspecialchars($row['illeness']); ?></p>
                    <p><strong>Dosage Schedule:</strong> <?php echo htmlspecialchars($row['dosage_schedule']); ?></p>
                    <p class="price"><strong>Price:</strong> ₹<?php echo htmlspecialchars($row['price']); ?></p>
                    <p class="stock <?php echo $row['stock'] > 0 ? 'in-stock' : ''; ?>">
                        <strong>Stock:</strong> <?php
                        if($row['stock'] == 0){
                            echo "Out of stock";
                        }elseif($row['stock'] <= 20){
                            echo "Limited Stock";
                        }else{
                            echo "In stock";
                        }
                       // echo $row['stock'] > 0 ? 'In Stock' : 'Out of Stock'; 
                        ?>
                    </p>
                    <a href="add_to_cart.php?pid=<?php echo $product_id; ?>" class="add-to-cart">Add to Cart</a>
                    <a href="buy.php?pid=<?php echo $product_id; ?>" class="add-to-cart">Buy Now</a>
                </div>
            </div>

            <!-- Footer -->
            <?php include('../footer.php'); ?>
        </body>
        </html>
        <?php
    } else {
        // If product not found, display an error
        echo '<p>Product not found.</p>';
    }
} else {
    // If no product ID is provided or invalid, display an error
    echo '<p>No product selected or invalid product ID.</p>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($row['pname']) ?> - MedDrip Pharmacy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container123 {
            max-width: 1200px;
            margin: 85px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product-image123 {
            flex: 1 1 40%;
            text-align: center;
        }
        .product-image123 img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .product-details123 {
            flex: 1 1 55%;
        }
        .product-details123 h1 {
            color: #2c3e50;
            font-size: 28px;
            margin-bottom: 10px;
        }
        .product-details123 p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            margin: 10px 0;
        }
        .product-details123 .price123 {
            font-size: 24px;
            color: #00b894;
            margin: 20px 0;
        }
        .product-details123 .stock123 {
            font-size: 18px;
        }
        .stock.in-stock123 { color: #27ae60; }
        .stock.limited123 { color: #f39c12; }
        .stock.out-of-stock123 { color: #e74c3c; }
        .action-buttons123 a {
            display: inline-block;
            padding: 10px 20px;
            margin-right: 10px;
            background-color: #00b894;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .action-buttons123 a:hover { background-color: #01966c; }
    </style>
</head>
<body>
    <div class="container123">
        <div class="product-image123">
            <img src="../../Backend/image1/<?= htmlspecialchars($row['image']) ?>" alt="Product Image">
        </div>
        <div class="product-details123">
            <h1><?= htmlspecialchars($row['pname']) ?></h1>
            <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($row['descript'])) ?></p>
            <p><strong>Illness:</strong> <?= htmlspecialchars($row['illeness']) ?></p>
            <p><strong>Dosage Schedule:</strong> <?= htmlspecialchars($row['dosage_schedule']) ?></p>
            <p class="price123"><strong>Price:</strong> ₹<?= htmlspecialchars($row['price']) ?></p>
            <p class="stock123 <?= $row['stock'] == 0 ? 'out-of-stock' : ($row['stock'] <= 20 ? 'limited' : 'in-stock') ?>">
                <strong>Stock:</strong> <?= $row['stock'] == 0 ? 'Out of stock' : ($row['stock'] <= 20 ? 'Limited Stock' : 'In stock') ?>
            </p>
            <div class="action-buttons123">
                <a href="cart.php?pid=<?= $product_id ?>">Add to Cart</a>
                <a href="payment.php?pid=<?= $product_id ?>">Buy Now</a>
            </div>
        </div>
    </div>
    <?php include('../footer.php'); ?>
</body>
</html>
