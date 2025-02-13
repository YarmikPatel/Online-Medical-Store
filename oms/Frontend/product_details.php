<?php
// Include database connection and navbar
include('../Backend/connection.php');
include 'nav.php';

// Check if the product ID is passed in the URL
if (isset($_GET['pid']) && is_numeric($_GET['pid'])) {
    $product_id = $_GET['pid'];

    // Prepare SQL query to fetch product details securely
    $sql = "SELECT pname, descript, illeness, dosage_schedule, price, stock, image 
            FROM product 
            WHERE pid = ?";
    $stmt = $conn->prepare($sql);

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
                    margin: 50px auto;
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
                    <img src="../Backend/image1/<?php echo htmlspecialchars($row['image']); ?>" alt="Product Image">
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
                    <a href="login.php" class="add-to-cart">Add to Cart</a>
                    <a href="login.php" class="add-to-cart">Buy Now</a>
                </div>
            </div>

            <!-- Footer -->
            <?php include('footer.php'); ?>
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
