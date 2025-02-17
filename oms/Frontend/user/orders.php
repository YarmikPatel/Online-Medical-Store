<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../Backend/connection.php');
include 'navbar.php';
$uid =  $_SESSION['uid'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            transition: filter 0.3s ease;
        }

        .container {
            max-width: 800px;
            margin: 68px;
            padding: 20px;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            padding: 10px;
            margin: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            margin: 0 0 10px;
            color: #007bff;
        }

        .card p {
            margin: 5px 0;
            color: #555;
        }

        .floating-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #007bff;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            border: none;
            z-index: 1000;
        }

        .floating-button:hover {
            background: #0056b3;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 999;
        }
        .status{
            width:100% ;
        }

        /* Order status trackin styles */
     .container1{
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      padding: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      width: 100%;
    }

    .container1 > div{
      width: 90%;
      max-width: 600px;
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 20px 30px;
      text-align: center;
    }

    .title {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      margin-bottom: 20px;
    }
    .status-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: relative;
      margin: 30px 0;
    }
    .status-bar::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 10%;
      width: 80%;
      height: 4px;
      background: #e0e0e0;
      transform: translateY(-50%);
      z-index: 0;
    }
    .status-step {
      position: relative;
      z-index: 1;
      text-align: center;
      flex: 1;
    }
    .status-circle {
      width: 30px;
      height: 30px;
      background: #e0e0e0;
      border-radius: 50%;
      margin: 0 auto;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
      color: #999;
      transition: all 0.3s ease;
    }
    .status-text {
      margin-top: 10px;
      font-size: 14px;
      color: #999;
    }
    .active .status-circle {
      background: #4caf50;
      color: #fff;
    }
    .active .status-text {
      color: #4caf50;
    }
    /* A placeholder for the text status */
    .status {
      font-size: 18px;
      margin-top: 20px;
    }
    /* Styling for the cancellation button */
    .cancel-btn {
      background-color: red;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 5px;
    }
    .cancel-btn[disabled] {
      opacity: 0.5;
      cursor: not-allowed;
    }

    .cancel_order {
    background-color: #ff4d4d; /* Red color for cancellation */
    color: white; /* White text */
    border: none; /* Remove default border */
    padding: 10px 20px; /* Add some padding */
    font-size: 16px; /* Set font size */
    font-weight: bold; /* Make text bold */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Change cursor to pointer */
    transition: background-color 0.3s ease; /* Smooth transition */
}

.cancel_order:hover {
    background-color: #cc0000; /* Darker red on hover */
}

    </style>
</head>
<body>
    
    <div class="container">
        <h1>Your Pending Order</h1>
        <?php
            // Fetch data from order_history table
            $sql = "SELECT * FROM order_history WHERE uid=$uid AND status !='delivered' AND status !='cancelled'";
            $result = $conn->query($sql);
        ?>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="card">
                    <form action="" method="post">
                        <?php $order_id = $row['oid']; ?>
                    <h3>Order ID: <?= htmlspecialchars($row['oid']) ?></h3>
                    <p><strong>Order Date:</strong> <?= htmlspecialchars($row['order_date']) ?></p>
                    <p><strong>Status:</strong> <?= htmlspecialchars($row['status']) ?></p>
                    <p><strong>Price:</strong> ₹<?= htmlspecialchars($row['price']) ?></p>
                    <p><strong>Quantity:</strong> <?= htmlspecialchars($row['qty']) ?></p>
                    <p><strong>Total Amount:</strong> ₹<?= htmlspecialchars($row['total_amount']) ?></p>
                <?php
                if($row['status'] == "pending" || $row['status'] == "shipped"){
                    ?>
                  <button type="submit" id="cancel_order" class="cancel_order" name="cancel_order">Cancel Order</button>
                    <?php 
                }
                    ?>
                    </form>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No Pending Orders.</p>
        <?php endif; ?>
    </div>
<!-- ramainning cancel_order -->
    <div class="container">
        <h1>Your Order History</h1>
        <?php
            // Fetch data from order_history table
            $sql = "SELECT * FROM order_history WHERE uid=$uid AND status ='delivered'";
            $result = $conn->query($sql);
        ?>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="card">
                    <h3>Order ID: <?= htmlspecialchars($row['oid']) ?></h3>
                    <p><strong>Order Date:</strong> <?= htmlspecialchars($row['order_date']) ?></p>
                    <p><strong>Status:</strong> <?= htmlspecialchars($row['status']) ?></p>
                    <p><strong>Price:</strong> ₹<?= htmlspecialchars($row['price']) ?></p>
                    <p><strong>Quantity:</strong> <?= htmlspecialchars($row['qty']) ?></p>
                    <p><strong>Total Amount:</strong> ₹<?= htmlspecialchars($row['total_amount']) ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>you haven't order anything till now.</p>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <?php include('../footer.php'); ?>
</body>
</html>

<?php
    if(isset($_POST['cancel_order'])){
        $sql = "UPDATE order_history SET status='cancelled' WHERE uid=$uid AND oid=$order_id";
        $result = mysqli_query($conn,$sql);

        echo "<script>window.location.href = 'orders.php';</script>";
    }
    
?>
