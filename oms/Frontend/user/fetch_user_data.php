<?php
include('../../Backend/connection.php');
$email = $_GET['email_id'];

$sql = "SELECT full_name, phone FROM registration WHERE email_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Return data as plain text, separated by a pipe '|'
    echo $user['full_name'] . "|" . $user['phone'];
} else {
    echo "error"; // Send an error response if no user is found
}

$conn->close();
?>
