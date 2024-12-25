<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Details</title>
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .card h3 {
            margin: 0 0 10px;
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
        }
        .floating-button:hover {
            background: #0056b3;
        }
        #prescription-form {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            display: none;
            z-index: 1000;
        }
        #prescription-form label {
            display: block;
            margin: 10px 0 5px;
        }
        #prescription-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #prescription-form button {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #prescription-form button:hover {
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Prescription Details</h1>

        <!-- Display success or error message -->
        <?php if (isset($success_message)): ?>
            <p style="color: green;"><?= htmlspecialchars($success_message) ?></p>
        <?php endif; ?>
        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?= htmlspecialchars($error_message) ?></p>
        <?php endif; ?>

        <!-- Display Prescription Details in Card Style -->
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="card">
            <h3>Illness: <?= htmlspecialchars($row['illeness']) ?></h3>
            <p><strong>Date:</strong> <?= htmlspecialchars($row['date']) ?></p>
            <p><strong>Dosage Schedule:</strong> <?= htmlspecialchars($row['dosage_schedule']) ?></p>
            <p><strong>Doctor Name:</strong> <?= htmlspecialchars($row['doctor_name']) ?></p>
            <p><strong>Hospital Name:</strong> <?= htmlspecialchars($row['hospital_name']) ?></p>
        </div>
        <?php endwhile; ?>
    </div>

    <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="hideForm()"></div>

    <!-- Floating Button -->
    <button class="floating-button" onclick="showForm()">+</button>

    <!-- Add Prescription Form -->
    <div id="prescription-form">
        <h2>Add Prescription</h2>
        <form method="POST" action="">
            <label for="date">Date:</label>
            <input type="date" name="date" required>
            <label for="illness">Illness:</label>
            <input type="text" name="illness" required>
            <label for="dosage_schedule">Dosage Schedule:</label>
            <input type="text" name="dosage_schedule" required>
            <label for="doctor_name">Doctor Name:</label>
            <input type="text" name="doctor_name" required>
            <label for="hospital_name">Hospital Name:</label>
            <input type="text" name="hospital_name" required>
            <button type="submit">Save</button>
        </form>
    </div>

    <script>
        function showForm() {
            document.getElementById('prescription-form').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
            document.body.style.filter = 'blur(5px)';
        }

        function hideForm() {
            document.getElementById('prescription-form').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
            document.body.style.filter = 'none';
        }
    </script>
</body>
</html>
