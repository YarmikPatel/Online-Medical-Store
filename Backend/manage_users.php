<?php
// include('admin_session.php');
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_dashboard.css">
    <link rel="stylesheet" href="add_categories.css">
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
    <title>Manage users - All users infromation</title>
</head>
<body>
    <div class="nav-bar">
            <ul class="menu">
                    <li><a href="#">MedPlus</a></li>
                    <li><a href="admin_logout.php">Log out</a></li>
            </ul>
    </div>
    <div>
        <p>Welcome to the Manage Users.</p>
    </div>
    <div class="headinfo">
        <p>Please! Click below buttons</p>
        <p>If you want to <strong>View Account Registration Information</strong> click on <strong>View Registrations</strong> or if you want to <strong>View Prescription Information</strong> click on <strong>View Prescriptions</strong> </p>    
    </div class="btns">
            <button onclick="loadContent('view_registration.php')">View Registrations</button>
            <button onclick="loadContent('view_prescription.php')">View Prescriptions</button>
    </div>
    <hr>

    <!-- Dynamic Content Section -->
    <div id="content">
        <p>Content will be displayed here.</p>
    </div>
</body>
</html>

<style>
    .headinfo p{
        display: block;
    }
    .btns button{
        display: block;
    }
</style>