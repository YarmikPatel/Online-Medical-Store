<?php
include('admin_session.php');
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add_categories.css">
</head>
<body>
    <!-- <p>helo world</p> -->
    <div class="main">
            <div class="title">
                <p>Users account information</p>
            </div>
            <div class="infotable">
                <table border="1">
                    <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>User Password</th>
                        <th>Mobile</th>
                        <th>Email ID</th>
                        <th>Address</th>
                    </tr>
                    <?php
                        // Fetch data from database
                        $sql = "Select * from registration";
                        $result =  mysqli_query($conn,$sql);
                        if($result && mysqli_num_rows($result) > 0){
                        // Output of each row
                        while($row = $result->fetch_assoc()){
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
                        }else{
                            echo "<tr><td>No records found</td></tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
</body>
</html>