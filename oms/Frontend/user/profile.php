<?php
include('../../Backend/connection.php');
include 'navbar.php';

// Check if user is logged in
if (!isset($_SESSION['uid'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$uid = $_SESSION['uid'];

// Fetch user data
$sql = "SELECT uname, full_name, mobile, email_id, address FROM registration WHERE uid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $uid);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file -->
    <style>
    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

.profile-container {
    max-width: 600px;
    margin: 50px auto;
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.profile-header {
    margin-bottom: 20px;
}

.profile-header h1 {
    color: #007bff;
    font-size: 26px;
}

.profile-header p {
    font-size: 16px;
    margin: 8px 0;
}

.profile-picture {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #007bff;
    margin-bottom: 15px;
}

.edit-profile {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 18px;
    background-color: #007bff;
    color: white;
    font-size: 14px;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.edit-profile:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.profile-navigation {
    margin-bottom: 20px;
}

.profile-navigation ul {
    list-style: none;
    display: flex;
    justify-content: space-around;
    background: #007bff;
    padding: 12px;
    border-radius: 8px;
}

.profile-navigation a {
    color: white;
    text-decoration: none;
    font-size: 14px;
    padding: 10px;
    transition: 0.3s;
}

.profile-navigation a:hover {
    background: #0056b3;
    border-radius: 5px;
}

@media (max-width: 600px) {
    .profile-container {
        max-width: 90%;
        padding: 20px;
    }
    
    .profile-navigation ul {
        flex-direction: column;
        text-align: center;
    }

    .profile-navigation a {
        display: block;
        padding: 12px 0;
    }
}
</style>
</head>
<body>
<div class="profile-container">
<div class="profile-navigation">
    <ul>
      <li class="active"><a href="orders.php">My Orders</a></li>
      <li><a href="prescription.php">My Prescriptions</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
  <div class="profile-header">
      <h1>User Profile</h1>
      <p>Username: <?php echo htmlspecialchars($user['uname']); ?></p>
      <p>Full Name: <?php echo htmlspecialchars($user['full_name']); ?></p>
      <p>Email: <?php echo htmlspecialchars($user['email_id']); ?></p>
      <p>Phone: <?php echo htmlspecialchars($user['mobile']); ?></p>
      <p>Address: <?php echo htmlspecialchars($user['address']); ?></p>
      <!-- <a href="edit_profile.php" class="edit-profile">Edit Profile</a> -->
  </div>  
</div>

<!-- Footer -->
    <?php include('../footer.php'); ?>
</body>
</html>
