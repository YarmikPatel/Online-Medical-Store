<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include('../../Backend/connection.php');
include 'navbar.php';

// Get order_id from URL (or default to 1 for testing)
$oid = isset($_GET['oid']) ? intval($_GET['oid']) : 1;

// Fetch order status
$query = "SELECT status FROM order_history WHERE oid = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $oid);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();

$currentStatus = $order['status']; // "Pending", "Shipped" and so on.

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
            margin: 20px auto;
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
    </style>
</head>
<script>
        // Helper function: Given a status name, return the corresponding step id.
        function getStepIdForStatus(status){
            switch(status.toLowerCase()){
                case 'pending': return 'step-pending';
                case 'shipped': return 'step-shipped';
                case 'out for delivery': return 'step-outfordelivery';
                case 'delivered': return 'step-delivered';
                default: return null;
            }
        }

        // Function to update the progress bar steps based on the current status.
        function updateStatusSteps(currentStatus){
            // First, remove the active class from all steps.
            document.querySelectorAll('.status-step').forEach(function(step){
                step.classList.remove('active');
            });

            // Mark all step up to "delivered" and including the current one as active.
            const stepsOrder = ['pendiing', 'shipped', 'out for delivery', 'delivered'];
            for(let status of stepsOrder){
                const stepId = getStepIdForStatus(status);
                if(stepId){
                    document.getElementById(stepId).classList.add('acive');
                }
                if(status.toLowerCase() === currentStatus.toLowerCase()){
                    break;
                }
            }
        }

        // Function to update the cancel button enabling/disabling.
        function updateCancelButton(currentStatus){
            const cancelBtn = document.querySelector('.cancel-btn');
            // Disable if status is "Out for Delivery" or "Delivered"
            if(currentStatus.toLowerCase() === "out for delivery" || currentStatus.toLowerCase() === "delivered"){
                cancelBtn.setAttribute('disabled', true);
                cancelBtn.setAttribute('title', 'Cancellation not allowed after shippping');
            }else{
                cancelBtn.removeAttribute('disable');
                cancelBtn.removeAttribute('title');
            }
        }

        // Function to refresh the orders status every interval (default 60 seconds)
        function refreshStatus(){
            let orderId = "<?php echo $oid; ?>"
            fetch("get_order_status.php?oid=" + orderId)
                .then(response => response.text())
                .then(data =>{
                    // Update the status text element.
                    document.getElementById("current-status").innerText = data;
                    // Update the progress bar steps.
                    updateStatusSteps(data);
                    // update the cancel button if necessary.
                    updateCancelButton(data);
                })
                .catch(error => console.error('Error fetching status:', error));
        }

        // Set initial state on page load
        updateStatusSteps("<?php echo $currentStatus ?>");

        // Refresh status every 60 seconds (60000 milliseconds).
        let pollingInterval = 10000;
        setInterval(refreshStatus, pollingInterval);
    </script>
<body>
    <div class="container1">
        <h2 class="title">Order Status</h2>
        <div class="status-bar">
            <div class="status-step" id="step-pending">
                <div class="status-circle"></div>   
                <div class="status-text">Pending</div>
            </div>
            <div class="status-step" id="step-shipped">
                <div class="status-circle"></div>
                <div class="status-text">Shipped</div>
            </div>
            <div class="status-step" id="step-outfordelivery">
                <div class="status-circle"></div>
                <div class="status-text">Out for Delivery</div>
            </div>
            <div class="status-step" id="step-delivered">
                <div class="status-circle"></div>
                <div class="status-text">Delivered</div>
            </div>
        </div>

        <!-- Dispaly the current status text -->
        <div class="status">Current Status: <span id="current-status"><?php $currentStatus ?></span></div>

        <!-- Cancellation Form -->
        <form action="cancel_order_status.php" method="POST">
            <input type="hidden" name="order_id" value="<?php echo $oid; ?>">
            <?php 
            // Determine if the cancellation button should be disabled.
            // In this example, we disable if the status is "Out for Delivery" or "Delivered"
            $disableCancel = ($currentStatus == "Out for Delivery" || $currentStatus == "Delivered");
            ?>
            <button type="submit" class="cancel-btn">
            <?php echo $disableCancel ? 'disabled title="Cancellation not allowed after shipping"' : ''; ?>    
            Cancel Order</button>
        </form>
    </div>
    <div class="container">
        <h1>Your Order History</h1>
        <?php
            // Fetch data from order_history table
            $sql = "SELECT * FROM order_history";
            $result = $conn->query($sql);
        ?>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="card">
                    <h3>Order ID: <?= htmlspecialchars($row['oid']) ?></h3>
                    <p><strong>Order Date:</strong> <?= htmlspecialchars($row['order_date']) ?></p>
                    <p><strong>User ID:</strong> <?= htmlspecialchars($row['uid']) ?></p>
                    <p><strong>Product ID:</strong> <?= htmlspecialchars($row['pid']) ?></p>
                    <p><strong>Status:</strong> <?= htmlspecialchars($row['status']) ?></p>
                    <p><strong>Price:</strong> $<?= htmlspecialchars($row['price']) ?></p>
                    <p><strong>Quantity:</strong> <?= htmlspecialchars($row['qty']) ?></p>
                    <p><strong>Total Amount:</strong> $<?= htmlspecialchars($row['total_amount']) ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </div>

    <div class="overlay"></div>

    <!-- Footer -->
    <?php include('../footer.php'); ?>
</body>
</html>

<?php
//$conn->close();
?>
