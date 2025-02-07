<?php
include('admin_session.php');
include('connection.php');
 include('menu.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_dashboard.css">
    <style>
        body {
            font-family: "Lato", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
            /* display: flex; */
        }

        a {
            text-decoration: none;
        }

        .main-content {
            margin-left: 0;
            flex-grow: 1;
            padding: 20px;
            transition: margin-left 0.5s;
        }
        
        .welcm {
            margin-left: 50px; /*Adds space between toggle button and Hi Admin message*/ 
            justify-content: space-between;
            display: flex;
        }

        .dashboard-items {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .dashboard-card {
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            flex: 1;
        }
        .dashboard-card a {
            text-decoration: none;
            color:rgb(132, 157, 181);
            font-weight: bold;
            font-size: 18px;
        }

        .alert-msg {
        padding: 15px;
        background-color: #f2f8fc;
        color: #3d4f61;
        border: 1px solid #c4d8e1;
        border-radius: 8px;
        margin-top: 20px;
        }

        .alert-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .alert-table th, .alert-table td {
            padding: 12px;
            border: 1px solid #c4d8e1;
            text-align: center;
            font-size: 14px;
        }

        .alert-table th {
            background-color: rgb(175, 4, 4);
            color: white;
        }

        .alert-table td {
            background-color: #e9f1f7;
        }

        .btn-update {
            display: inline-block;
            padding: 12px 20px;
            background-color:rgb(136, 8, 8);
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }

        .btn-update:hover {
            background-color:rgb(93, 5, 5);
            text-decoration: underline;
        }

        .center-btn {
            text-align: center;
            margin-top: 20px;
        }

        .no-alerts {
            color: #3e8e41;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 10px;
            border-radius: 5px;
        }

        .error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- <span id="menuBtn" class="menu-btn" onclick="openNav()">&#9776;</span> -->
    <div class="main-content" id="main">
        <div class="welcm">
            <div class="welcm-title">
                <p id="wlcm_admin">Hi Admin, <?php echo $_SESSION['admin_name']; ?></p>
            </div>
            <div class="welcm-head">
                <a href="admin_logout.php">Log Out</a>
            </div>
        </div>
        <div class="dashboard-items">
            <a href="manage_inventory.php" class="dashboard-card"><div>Manage Inventory</div></a>
            <a href="manage_users.php" class="dashboard-card"><div>Manage Users</div></a>
            <a href="manage_orders.php" class="dashboard-card"><div>Manage Orders</div></a>
            <a href="report.php" class="dashboard-card"><div>Report</div></a>
        </div>


        <div class="alert-msg">
            <?php
              // Query to get products with stock less than 20
                 $sql = "SELECT pname, stock, pid FROM product WHERE stock < 20";
                 $result = mysqli_query($conn, $sql);

                    if($result){
                         if(mysqli_num_rows($result) > 0){
                                echo "<strong>Stock Alerts:</strong><br>";
                                echo "<table class='alert-table'>";
                                echo "<thead><tr><th>Product Name</th><th>Stock Left</th></tr></thead>";
                                echo "<tbody>";
                                // Loop through the results and display each product with low stock in table rows
                                        while($row = $result->fetch_assoc()){
                                             echo "<tr>";
                                             echo "<td>" . $row['pname'] . "</td>";
                                             echo "<td>" . $row['stock'] . "</td>";
                                             echo "</tr>";
                                        }
                                echo "</tbody>";
                                echo "</table>";
                                // Display the update button below the table
                                echo "<div class='center-btn'><a href='update_products.php' class='btn-update'>Update All Products</a></div>";
                        } else {
                             echo "<div class='no-alerts'>No stock alerts at the moment.</div>";
                        }
                    } else {
                        echo "<div class='error'>Error retrieving stock information. Please try again later.</div>";
                    }
            ?>
        </div>
   
    </div>
</body>
</html>
