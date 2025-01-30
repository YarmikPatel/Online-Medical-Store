<?php
include('../../Backend/connection.php');

// Fetch user data
// $sql = "SELECT * FROM users WHERE id = 1";
// $result = $conn->query($sql);
// $user = $result->fetch_assoc();
// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    text-align: center;
    padding: 20px;
}

.profile-container {
    background: white;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    margin: auto;
    box-shadow: 0px 0px 10px gray;
}

.profile-info p {
    margin: 10px 0;
}

button {
    background: #007bff;
    color: white;
    border: none;
    padding: 10px;
    margin-top: 10px;
    cursor: pointer;
    border-radius: 5px;
}

.edit-form {
    margin-top: 10px;
}

.edit-form input {
    width: 90%;
    padding: 8px;
    margin: 5px 0;
    border: 1px solid gray;
    border-radius: 5px;
}

    </style>
</head>
<body>

    <div class="profile-container">
        <h2>User Profile</h2>
        <?Php
        // Get the product ID from the URL
        if (isset($_GET['uid'])) {
            $uid = $_GET['uid'];
            echo $uid;
            // Fetch product details from the database
            $sql = "SELECT uname, full_name, upass, mobile, email_id, address  
            FROM registration
            WHERE uid = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $uid);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $user = $result->fetch_assoc()) {
        echo '<div class="profile-info">';
        echo '<p><strong>User Name:</strong>' .  $user['uname'] . '</p>';
        echo '<p><strong>Full Name:</strong>' .  $user['full_name'] . '</p>';
        echo '<p><strong>Password:</strong>' .  $user['upass'] . '</p>';
        echo '<p><strong>Mobile:</strong>' .  $user['mobile'] . '</p>';
        echo '<p><strong>Email_id:</strong>' . $user['email_id'] . '</p>';
        echo '<p><strong>Address:</strong>' . $user['address'] . '</p>';
        echo '</div>';
            } else {
                echo '<p>User not found.</p>';
            }
        } else {
            echo '<p>Server Error.</p>';
        }
        ?>
        <button onclick="document.getElementById('edit-form').style.display='block'">Edit Profile</button>

        <div class="edit-form" id="edit-form" style="display:none;">
            <h3>Edit Profile</h3>
            <form action="update_profile.php" method="POST">
                <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
                <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
                <input type="text" name="phone" value="<?php echo $user['phone']; ?>" required>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

</body>
</html>
