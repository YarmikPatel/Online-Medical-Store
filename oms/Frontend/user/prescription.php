<?php
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
            left: 20px;
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

        /* Prescription Form Styling */
.form-container {
    width: 100%;
    max-width: 400px;
    background: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
}

.add_prescription {
    color: #333;
    font-size: 22px;
    margin-bottom: 15px;
}

form input {
    width: calc(100% - 20px);
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    display: block;
}

.btn-submit {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    background-color: #28a745;
    color: white;
}

.btn-submit:hover {
    background-color: #218838;
}

.btn-cancel {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    background-color: #dc3545;
    color: white;
}

.btn-cancel:hover {
    background-color: #c82333;
}
    </style>
</head>
<body>
    <div class="container">
        <h1 class="your_pre">Your Prescription Details</h1>
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
            <h2 class="add_prescription">Add Prescription</h2>
            <form method="POST">
                <input type="date" name="date" required>
                <input type="text" name="illness" placeholder="Illness" required>
                <input type="text" name="mname" placeholder="Medicine Name" required>
                <input type="text" name="dosage_schedule" placeholder="Dosage Schedule" required>
                <input type="text" name="doctor_name" placeholder="Doctor Name" required>
                <input type="text" name="hospital_name" placeholder="Hospital Name" required>
                <button type="submit" class="btn-submit" name="add_prescription">Submit</button>
                <button type="button" class="btn-cancel" onclick="document.getElementById('overlay').style.display='none'">Cancel</button>
            </form>
        </div>
    </div>

    <?php include('../footer.php'); ?>
</body>
</html>
