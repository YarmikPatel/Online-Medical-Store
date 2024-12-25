<?php
include('../../Backend/connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../product_catalogue.css">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="menu">
    <?php
            $sql = "SELECT p.pname, p.descript, p.illeness, p.dosage_schedule, p.price, p.image, c.name FROM product p INNER JOIN category c ON p.category_id = c.category_id";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card">';
                        echo '<img src="' . $row['image'] . '" alt="Product Image">';
                        echo '<div class="card-content">';
                            echo '<div class="category">' . $row['name'] . '</div>';
                            echo '<div class="product-name"><strong>Medicine:</strong>' . $row['pname'] . '</div>';
                            echo '<div class="product-description"><strong>Description:</strong>' . $row['descript'] . '</div>';
                            echo '<div class="product-description"><strong>Illness:</strong> ' . $row['illeness'] . '</div>';
                            echo '<div class="product-description"><strong>Dosage:</strong> ' . $row['dosage_schedule'] . '</div>';
                            echo '<div class="price">₹' . $row['price'] . '</div>';
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