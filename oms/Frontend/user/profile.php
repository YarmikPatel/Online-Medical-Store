<?php
include 'user_session.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Basic Reset and Box-sizing */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: sans-serif; /* Choose a professional font */
  line-height: 1.6;
  color: #333; /* Dark gray text color */
  background-color: #f4f4f4; /* Light gray background */
}

.profile-container {
  max-width: 960px; /* Adjust as needed */
  margin: 110px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.profile-header {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
  border-bottom: 1px solid #ddd; /* Subtle separator */
  padding-bottom: 20px;
}

.profile-avatar {
  margin-right: 20px;
}

.profile-avatar img {
  width: 100px;
  height: 100px;
  border-radius: 50%; /* Make it circular */
  object-fit: cover; /* Prevent image distortion */
  border: 2px solid #fff; /* White border */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.edit-avatar, .edit-profile {
    margin-top: 10px; /* Space below avatar/profile info */
    padding: 8px 16px;
    background-color: #007bff; /* Example: Blue button */
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s; /* Smooth hover effect */
  }
  .edit-avatar:hover, .edit-profile:hover{
    background-color: #0056b3; /* Darker blue on hover */
  }

.profile-info h1 {
  margin-bottom: 5px;
  color: #007bff; /* Example: Blue heading */

}

.profile-info p {
  margin-bottom: 5px;
}

.profile-navigation ul {
  list-style: none;
  display: flex;
  border-bottom: 1px solid #ddd;
  padding-bottom: 10px;
  margin-bottom: 20px;
}

.profile-navigation li {
  margin-right: 20px;
}

.profile-navigation a {
  text-decoration: none;
  color: #333;
  padding: 10px; /* Add some padding around links */
  border-radius: 4px; /* Add some border radius */
  transition: background-color 0.3s, color 0.3s;
}

.profile-navigation a:hover,
.profile-navigation li.active a {
  background-color: #007bff; /* Blue background on hover and active */
  color: white;
}

.profile-content section {
  display: none; /* Hide all sections initially */
  padding: 20px;
}

.profile-content section.active {
  display: block; /* Show the active section */
}

/* Responsive Design (Example) */
@media (max-width: 768px) {
  .profile-header {
    flex-direction: column; /* Stack avatar and info vertically */
    align-items: flex-start;
  }

  .profile-avatar {
    margin-right: 0;
    margin-bottom: 10px;
  }

  .profile-navigation ul {
    flex-direction: column; /* Stack navigation vertically */
  }

  .profile-navigation li {
    margin-right: 0;
    margin-bottom: 10px;
  }
}

/* Form Styles (If you have forms in your sections) */
label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
/* ... other input types */
select,
textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}
    </style>
</head>
<body>
<div class="profile-container">
  <div class="profile-header">
    <div class="profile-avatar">
      <img src="path/to/avatar.jpg" alt="Profile Picture">
      <button class="edit-avatar">Edit</button> </div>
    <div class="profile-info">
      <h1>User Name</h1>
      <p>Email: user@example.com</p>
      <p>Phone: +1-555-123-4567</p>
      <p>Address: 123 Main St, Anytown, CA 91234</p>
      <button class="edit-profile">Edit Profile</button>
    </div>
  </div>

  <div class="profile-navigation">
    <ul>
      <li class="active"><a href="#orders">My Orders</a></li>
      <li><a href="#prescriptions">My Prescriptions</a></li>
      <li><a href="#address-book">Address Book</a></li>
      <li><a href="#payment-methods">Payment Methods</a></li>
      <li><a href="#settings">Settings</a></li>
      <li><a href="#logout">Logout</a></li>
    </ul>
  </div>

  <div class="profile-content">
    <section id="orders" class="active">
      <h2>My Orders</h2>
      </section>

    <section id="prescriptions">
      <h2>My Prescriptions</h2>
      </section>

    <section id="address-book">
      <h2>Address Book</h2>
      </section>

    <section id="payment-methods">
      <h2>Payment Methods</h2>
      </section>

    <section id="settings">
      <h2>Settings</h2>
      </section>
  </div>
</div>
</body>
</html>