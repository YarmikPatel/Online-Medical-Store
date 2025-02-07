<?php 
include('admin_session.php');
include('connection.php'); 
include 'menu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleting Product</title>
    <link rel="stylesheet" href="add_categories.css">
</head>
<body>
    <!-- <div class="main"> -->
    <?php
     if (isset($success_message)) echo "<p class='success'>$success_message</p>"; 
     ?>
    <?php
     if (isset($error_message)) echo "<p class='error'>$error_message</p>"; 
     ?> 
        <table>
            <tr>
                <th>User Id</th>
                <th>User Name</th>
                <th>Full Name</th>
                <th>Password</th>
                <th>Mobile</th>
                <th>Email ID</th>
                <th>Address</th>
            </tr>
            
            <?php
                // Fetch data from the database
                $sql = "SELECT * FROM registration";
                $result = mysqli_query($conn, $sql);
                if ($result && mysqli_num_rows($result) > 0) {
                    // Output of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['uid'] . "</td>";
                        echo "<td>" . $row['uname'] . "</td>";
                        echo "<td>" . $row['full_name'] . "</td>";
                        echo "<td>" . $row['upass'] . "</td>";
                        echo "<td>" . $row['mobile'] . "</td>";
                        echo "<td>" . $row['email_id'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No records found</td></tr>";
                }
            ?>
        </table>

        
            <form method="post">
                <div class="inputBx">
                    <label for="cid">Enter User ID:</label>
                    <input type="text" id="uid" name="uid" required>
                </div>
                <div class="inputBx_button">
                    <input type="submit" name="delete_user" value="Delete User">
                </div>
            </form>
       
                
    <!-- </div>  -->
</body>
</html>


