<?php 
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Test Information (Accordions with Progress Bars)</title>
    <style>
        body {
            font-family: sans-serif;
            line-height: 1.6;
            /* margin: 20px; */
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
        }

        .age-group {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .age-group h2 {
            background-color: #f0f0f0;
            padding: 10px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }

        .age-content {
            padding: 10px;
            display: none;
            border-top: 1px solid #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .toggle-icon {
            font-weight: bold;
            transition: transform 0.2s ease;
        }

        .age-group h2.active .toggle-icon {
            transform: rotate(90deg);
        }

        .progress-container {
            width: 100%;
            margin-bottom: 10px;
        }

        .progress-bar {
            height: 20px;
            display: flex;
            border-radius: 5px;
            overflow: hidden;
            border: 1px solid #ddd;
        }

        .segment {
            height: 100%;
            text-align: center;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: smaller;
            position: relative;
        }

        .very-good {
            background-color: #4CAF50;
        }

        .good-normal {
            background-color: #FFC107;
        }

        .not-good {
            background-color: #FF9800;
        }

        .needs-treatment {
            background-color: #F44336;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
            font-size: smaller;
        }

        .category {
            text-align: center;
        }

        .category-name {
            font-weight: bold;
            display: block;
            margin-bottom: 3px;
            color: #555;
        }

        .category-description {
            color: #777;
        }

        .percentage-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: smaller;
            color: white;
        }

        .disclaimer {
            font-size: smaller;
            color: #777;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Understanding Your Lab Test Results</h1>

        <div class="age-group">
            <h2>Kids <span class="toggle-icon">+</span></h2>
            <div class="age-content">
                <table>
                    <thead>
                        <tr>
                            <th>Test Name</th>
                            <th>Very Good</th>
                            <th>Good/Normal</th>
                            <th>Not Good</th>
                            <th>Needs to be Treated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Complete Blood Count (CBC)</td>
                            <td>
                                <div class="progress-container">
                                    <div class="progress-bar">
                                        <div class="segment very-good" style="width: 30%;">
                                            <span class="percentage-label">30%</span>
                                        </div>
                                        <div class="segment good-normal" style="width: 50%;">
                                            <span class="percentage-label">50%</span>
                                        </div>
                                        <div class="segment not-good" style="width: 15%;">
                                            <span class="percentage-label">15%</span>
                                        </div>
                                        <div class="segment needs-treatment" style="width: 5%;">
                                            <span class="percentage-label">5%</span>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="category">
                                            <span class="category-name">Very Good:</span>
                                            <span class="category-description">All levels perfect</span>
                                        </div>
                                        <div class="category">
                                            <span class="category-name">Good/Normal:</span>
                                            <span class="category-description">Slightly lower or higher but within range</span>
                                        </div>
                                        <div class="category">
                                            <span class="category-name">Not Good:</span>
                                            <span class="category-description">Low red or white cells, risk of infection</span>
                                        </div>
                                        <div class="category">
                                            <span class="category-name">Needs to be Treated:</span>
                                            <span class="category-description">Severe anemia or infection found</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="progress-container">
                                    <div class="progress-bar">
                                        <div class="segment very-good" style="width: 20%;">
                                            <span class="percentage-label">20%</span>
                                        </div>
                                        <div class="segment good-normal" style="width: 60%;">
                                            <span class="percentage-label">60%</span>
                                        </div>
                                        <div class="segment not-good" style="width: 15%;">
                                            <span class="percentage-label">15%</span>
                                        </div>
                                        <div class="segment needs-treatment" style="width: 5%;">
                                            <span class="percentage-label">5%</span>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="category">
                                            <span class="category-name">Very Good:</span>
                                            <span class="category-description">All levels perfect</span>
                                        </div>
                                        <div class="category">
                                            <span class="category-name">Good/Normal:</span>
                                            <span class="category-description">Slightly lower or higher but within range</span>
                                        </div>
                                        <div class="category">
                                            <span class="category-name">Not Good:</span>
                                            <span class="category-description">Low red or white cells, risk of infection</span>
                                        </div>
                                        <div class="category">
                                            <span class="category-name">Needs to be Treated:</span>
                                            <span class="category-description">Severe anemia or infection found</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // ... (JavaScript for accordion functionality - same as before) ...
        const ageGroupHeaders = document.querySelectorAll('.age-group h2');

        ageGroupHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const content = header.nextElementSibling;
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
                header.classList.toggle('active'); // Toggle active class for icon rotation
            });
        });
    </script>
</body>
</html>