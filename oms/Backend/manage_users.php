<?php
include('admin_session.php');
include('connection.php');
include('menu.php');

if (isset($_POST['delete_user'])) {
    $uid = $_POST['uid'];
    
    // Using prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM registration WHERE uid = ?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $success_message = "User Deleted Successfully";
    } else {
        $error_message = "Failed to delete user or user not found";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - MedDrip Pharmacy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .btns {
            text-align: center;
            margin-bottom: 20px;
        }

        .btns button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .btns button:hover {
            background-color: #218838;
        }

        #content {
            min-height: 300px;
            padding: 20px;
            border-radius: 5px;
            background: #fff;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .btns button {
                width: 100%;
                padding: 14px;
                font-size: 18px;
            }
        }
    </style>
    <script>
        function loadContent(page) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', page, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById('content').innerHTML = xhr.responseText;
                } else {
                    document.getElementById('content').innerHTML = "<p>Error loading content.</p>";
                }
            };
            xhr.send();
        }
    </script>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; color: #333;">Manage Users</h2>
        
        <div class="btns">
            <button onclick="loadContent('view_registration.php')">View Registrations</button>
            <button onclick="loadContent('view_prescription.php')">View Prescriptions</button>
        </div>
        <hr>
        <div id="content"></div>
    </div>
</body>
</html>
