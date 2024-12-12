<?php
include('../../Backend/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback form</title>
    <link rel="stylesheet" href="feedback.css">
</head>
<body>
<div class="container">
        <h2>Feedback Form</h2>
        <?php
        // Display success or error messages if set
        if (isset($_GET['message'])) {
            $messageType = $_GET['type'] ?? 'success';
            echo "<div class='" . htmlspecialchars($messageType) . "'>" . htmlspecialchars($_GET['message']) . "</div>";
        }
        ?>
        <form action="" method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}">

            <label for="message">Feedback</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>
    
    <!-- insert feedback into feedback table -->
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //retrieve from data 
            $email=trim($_POST['email']);
            $message=trim($_POST['message']);

            $sql = "INSERT INTO `feedback` (email_id,msg) VALUES ('$email','$message')";
            $result = mysqli_query($conn,$sql);
        }
    ?>
</body>
</html>
