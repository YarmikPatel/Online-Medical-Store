<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <p>helo world</p> -->
    <div class="main">
            <div class="title">
                <p>Users Prescription Information</p>
            </div>
            <div>
                <table>
                    <th>
                        <td>Prescription ID</td>
                        <td>User ID</td>
                        <td>Date</td>
                        <td>Illeness</td>
                        <td>Medicince Name</td>
                        <td>Dosage Schedule</td>
                        <td>Doctor Name</td>
                        <td>Hospital Name</td>
                    </th>
                    <?php
                        // Fetch data from database
                        $sql = "Select * from prescription_detail";
                        $result =  mysqli_query($conn,$sql);
                        if($result && mysqli_num_rows($result) > 0){
                        // Output of each row
                        while($row = $result->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>" . $row['pre_id'] . "</td>";
                            echo "<td>" . $row['uid'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['illeness'] . "</td>";
                            echo "<td>" . $row['mname'] . "</td>";
                            echo "<td>" . $row['dosage_schedule'] . "</td>";
                            echo "<td>" . $row['doctor_name'] . "</td>";
                            echo "<td>" . $row['hospital_name'] . "</td>";
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