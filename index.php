<?php
$servername="localhost";
$username="root";
$password="";
$dbname="medical_store";

//create connection

$conn = new mysqli($servername,$username,$password,$dbname);

//check connection

if($conn->connect_error){
        // die("commection failed :" .$conn->connect_error);
        die("commection failed :");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - MedDrip Pharmacy</title>
    <style>
        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
label {
    font-size: 16px;
    font-weight: bold;
    color: #333; /* Dark gray text */
    display: block;
    margin-bottom: 5px;
}
/* Body Styling */
body {
    background: linear-gradient(135deg, #74ebd5, #9face6);
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 20px;
}

/* Header */
header {
    background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    text-align: center;
    padding: 20px 0;
    border-radius: 10px;
    width: 100%;
    max-width: 800px;
    margin-bottom: 30px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

header h1 strong {
    color: #ffd700;
}

/* Main Container */
main {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    padding: 40px;
    width: 100%;
    max-width: 400px;
    text-align: center;
    backdrop-filter: blur(10px);
}

main h2 {
    margin-bottom: 20px;
    color: #6a11cb;
    font-size: 1.8rem;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
}

/* Form Styling */
form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.inputBx {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 100%;
}

.inputBx input {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    background: #f4f4f9;
    box-shadow: inset 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease, transform 0.2s ease;
}

.inputBx input:focus {
    outline: none;
    box-shadow: inset 0 4px 12px rgba(106, 17, 203, 0.5);
    transform: scale(1.02);
}

#submit input {
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: white;
    font-size: 18px;
    font-weight: bold;
    border: none;
    padding: 12px;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
}

#submit input:hover {
    background: linear-gradient(135deg, #2575fc, #6a11cb);
    transform: scale(1.05);
}

/* Footer */
footer {
    margin-top: 20px;
    text-align: center;
    font-size: 14px;
    color: #fff;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}

footer p {
    line-height: 1.6;
}

footer strong {
    color: #ffd700;
}

    </style>
    <script>
            function validateform(event){    //function for input validation
                const validcode =document.getElementById('acode').value;  //
        
                  if(validcode == ''){
                         alert('Field required');
                         event.preventDefault(); // Stops form from submission
                         return false;
                 }
            return true;
            }
</script>
</head>

<body>
    <header>
        <h1> Give code to open <strong>MedDrip Pharmacy</strong></h1>
    </header>
    <main>
        <h2>Admin verification</h2>
        <div>
            <form action="" method="post" class="verify" onsubmit="return validateform(event)">
                <div class="inputBx" id="admincode">
                    <input type="password" name="code" id="acode" placeholder="Enter admin code" required>
                </div>
                <div class="inputBx" id="submit">
                    <input type="submit" value="Verify passcode">
                </div>
            </form>
        </div>
    </main>
    <footer>
        <p>2024 of MedDrip. All rights reserved.<br>Created by Tirth Barot and Yarmik Kansagara.</p>
    </footer>
</body>
</html>

<?php
$login = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $code = $_POST["code"];
    //SQL query to check data from database.
    $sql = "Select * from admin_info where code='$code'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    //Verifying the data from database.
    if($num >= 1){
        $login = true;
         session_start();
        $_SESSION['code'] = $code;
        $_SESSION['is_admin_logged_in'] = true;
        $_SESSION['admin_last_activity'] = time();
        header("location:oms");
    }
    else{
        echo "<script>alert('Invalid credentials');</script>";
    }
}
?>
