<?php
include('../../Backend/connection.php');
include('navbar.php');
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
        <!-- <?php
        // Display success or error messages if set
        //  if (isset($_GET['message'])) {
        //      $messageType = $_GET['type'] ?? 'success';
        //      echo "<div class='" . htmlspecialchars($messageType) . "'>" . htmlspecialchars($_GET['message']) . "</div>";
        //  }
        ?> -->
        <form action="" method="POST">
            <label for="name">Name</label>
            <input type="text" id="full_name" name="full_name" readonly>

            <label for="email">Email</label>
            <input type="email" id="email_id" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" readonly>
            <!-- <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}"> -->

            <label for="message">Feedback</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
        <p id="errormsg"></p>
    </div>
    
    <!-- insert feedback into feedback table -->
    <!-- <?php 
        // if($_SERVER["REQUEST_METHOD"] == "POST"){
        //     //retrieve from data 
        //     $email=trim($_POST['email']);
        //     $message=trim($_POST['message']);

        //     $sql = "INSERT INTO `feedback` (email_id,msg) VALUES ('$email','$message')";
        //     $result = mysqli_query($conn,$sql);
        // }
    ?> -->
<script>
    function fetchUserData(){
        const email_id = document.getElementById('email_id').value;

        // Create XMLHTTpRequest object.
        const xhr = new XMLHttpRequest();

        // Set up the request
        xhr.open("GET",'fetch_user_data.php?email_id=${email_id}',true);

        // Handle the response.
        xhr.onload = function (){
            if(xhr.status === 200){
                const response = xhr.responseText;

                if(response !== "error"){
                    // Spliting the response the pipe delimiter
                    const [username,phone] = response.split("|");

                    // Populate the form fields
                    document.getElementById("full_name").value = username;
                    document.getElementById("phone").value = phone;

                }else{
                    document.getElementById("errormsg").textContent = 'No user found with this email';
                    document.getElementById("full_name").value = "";
                    document.getElementById("phone").value = "";   
                }
            }
        };
        // Send the request
        xhr.send();
    }
</script>

<!-- Footer -->
<?php include('../footer.php'); ?>
</body>
</html>
