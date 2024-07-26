<?php
include 'config.php';

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Medical Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome to Our Online Medical Store</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="add_product.php">Add Product</a></li>
            <li><a href="orders.php">View Orders</a></li>
        </ul>
    </nav>

    <main>
        <h2>Products</h2>
        <div class="product-list">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<h3>" . $row["name"] . "</h3>";
                    echo "<p>" . $row["description"] . "</p>";
                    echo "<p>Price: $" . $row["price"] . "</p>";
                    echo "<p>Stock: " . $row["stock"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No products available.</p>";
            }
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Online Medical Store. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
