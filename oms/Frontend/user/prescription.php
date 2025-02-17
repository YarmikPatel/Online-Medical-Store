<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../../Backend/connection.php');
include 'navbar.php';
$uid = $_SESSION['uid'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_prescription'])) {
    $date = $_POST['date'];
    $illness = $_POST['illness'];
    $mname = $_POST['mname'];
    $dosage_schedule = $_POST['dosage_schedule'];
    $doctor_name = $_POST['doctor_name'];
    $hospital_name = $_POST['hospital_name'];

    $sql = "INSERT INTO prescription_detail (uid, date, illeness, mname, dosage_schedule, doctor_name, hospital_name) 
            VALUES ('$uid', '$date', '$illness', '$mname', '$dosage_schedule', '$doctor_name', '$hospital_name')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Prescription added successfully!'); window.location.href = 'prescription.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
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

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Prescription Details</h1>
        <?php
            $sql = "SELECT * FROM prescription_detail WHERE uid=$uid";
            $result = $conn->query($sql);
        ?>
        <?php if ($result->num_rows > 0){ ?>
            <?php while ($row = $result->fetch_assoc()){ ?>
                <div class="card">
                    <h3>Date: <?= htmlspecialchars($row['date']) ?></h3>
                    <p><strong>Illness:</strong> <?= htmlspecialchars($row['illeness']) ?></p>
                    <p><strong>Medicine Name:</strong> <?= htmlspecialchars($row['mname']) ?></p>
                    <p><strong>Dosage schedule:</strong> <?= htmlspecialchars($row['dosage_schedule']) ?></p>
                    <p><strong>Doctor Name:</strong> <?= htmlspecialchars($row['doctor_name']) ?></p>
                    <p><strong>Hospital Name:</strong> <?= htmlspecialchars($row['hospital_name']) ?></p>
                </div>
            <?php } 
        }else{ ?>
            <p>You haven't added any Prescription Details</p>
        <?php } ?>
    </div>

    <button class="floating-button" onclick="document.getElementById('overlay').style.display='flex'">+</button>

    <div id="overlay" class="overlay">
        <div class="form-container">
            <h2>Add Prescription</h2>
            <form method="POST">
                <input type="date" name="date" required>
                <input type="text" name="illness" placeholder="Illness" required>
                <input type="text" name="mname" placeholder="Medicine Name" required>
                <input type="text" name="dosage_schedule" placeholder="Dosage Schedule" required>
                <input type="text" name="doctor_name" placeholder="Doctor Name" required>
                <input type="text" name="hospital_name" placeholder="Hospital Name" required>
                <button type="submit" name="add_prescription">Submit</button>
                <button type="button" onclick="document.getElementById('overlay').style.display='none'">Cancel</button>
            </form>
        </div>
    </div>

    <?php include('../footer.php'); ?>
</body>
</html>
