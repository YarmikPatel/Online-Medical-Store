<?php 
// include('admin_session.php');
include('connection.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_categories.css">
    <title>Add Product - Category</title>
    <style>
        /* General Reset */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        /* Main Container */
        .main {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #0bc05370;
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Form Styles */
        .form-container {
            display: none; /* Initially hidden */
            transition: all 0.3s ease-in-out;
            background-color: #f9f9f9;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .inputBx {
            margin-bottom: 15px;
        }

        .inputBx input[type="text"],
        .inputBx input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .inputBx input[type="text"]:focus {
            border-color: #0bc05370;
            outline: none;
        }

        .inputBx input[type="submit"] {
            background-color: #0bc05370;
            color: white;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s;
        }

        .inputBx input[type="submit"]:hover {
            background-color: #0bc05370;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main {
                width: 95%;
            }

            table th, table td {
                font-size: 14px;
                padding: 8px;
            }

            .inputBx input[type="text"],
            .inputBx input[type="submit"] {
                font-size: 14px;
            }
        }
    </style>
    <script>
        function toggleForm() {
            const formContainer = document.getElementById('form-container');
            const toggleButton = document.getElementById('toggle-button');

            if (formContainer.style.display === 'none' || formContainer.style.display === '') {
                formContainer.style.display = 'block';
                toggleButton.textContent = 'Hide Form';
            } else {
                formContainer.style.display = 'none';
                toggleButton.textContent = 'Show Form';
            }
        }
    </script>
</head>
<body>
    <div class="main">
        <table border="1">
            <tr>
                <th>Category ID</th>
                <th>Category Name</th>
            </tr>
            <?php
            try {
                // Fetch data from database
                $sql = "SELECT * FROM category";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    // Output each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['category_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No records found</td></tr>";
                }
            } catch (Exception $e) {
                echo "<tr><td colspan='2'>Error: " . $e->getMessage() . "</td></tr>";
            }
            ?>
            <!-- Form Container Row -->
            <tr colspan="2" id="form-container" class="form-container">
                <td >
                    <form method="post">
                        <div class="inputBx">
                            Enter category ID <br>
                            <input type="text" name="category_id" id="category_id" required>
                        </div>
                        <div class="inputBx">
                            Enter category name <br>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div class="inputBx">
                            <input type="submit" value="Add category">
                        </div>
                    </form>
                </td>
            </tr>
        </table>

        <!-- Toggle Button -->
        <button id="toggle-button" onclick="toggleForm()" style="padding: 10px 20px; background-color: #0bc05370; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Show Form
        </button>
    </div>
</body>
</html>
