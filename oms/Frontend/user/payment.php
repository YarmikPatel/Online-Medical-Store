<?php
    session_start();
    if(!isset($_SESSION['uid'])){
        die('User not logged in. UID not found in session.');
    }
    include('../../Backend/connection.php');
    include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .payment-container10 {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            height: auto;
            margin: 111px auto;
        }

        .py {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .payment-method10 {
            margin-bottom: 30px;
        }

        .payment-method10 label {
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
            cursor: pointer;
        }

        .payment-method10 input[type="radio"] {
            margin-right: 5px;
            transform: scale(1.2);
            accent-color: #4CAF50;
        }

        .card-details10, .cod-details10 {
            margin-top: 20px;
            display: none;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"], input[type="password"], input[type="month"], input[type="tel"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.2);
        }

        .input-group10 {
            display: flex;
            gap: 10px;
        }

        .input-group10 input {
            width: calc(50% - 5px);
        }

        .btn10 {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn10:hover {
            background-color: #45a049;
        }

        .btn10:active {
            background: #3e8e41;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) inset;
        }
        .error-message {
    color: #d9534f; /* Bootstrap Danger Red */
    font-size: 14px;
    font-weight: bold;
    margin-top: 5px;
    display: block;
    padding: 3px 8px;
    background: rgba(217, 83, 79, 0.1); /* Light Red Background */
    border-left: 3px solid #d9534f;
    border-radius: 3px;
}
    </style>
</head>
<body>

<div class="payment-container10">
    <h2 class="py">Payment Confirm Here</h2>

    <div class="payment-method10">
        <label>
            <input type="radio" name="payment-method" id="credit-card" checked> Credit Card
        </label>
        <label>
            <input type="radio" name="payment-method" id="debit-card"> Debit Card
        </label>
        <label>
            <input type="radio" name="payment-method" id="cod"> Cash on Delivery
        </label>

        <div class="card-details10">
            <div class="input-group10">
                <input type="text" name="card-number" placeholder="Card Number" required>
                <input type="text" name="card-holder" placeholder="Card Holder Name" required>
            </div>
            <div class="input-group10">
                <input type="month" name="expiry-date" required>
                <input type="password" name="cvv" placeholder="CVV" required>
            </div>
        </div>

        <div class="cod-details10">
            <p>You will pay when you receive the goods.</p>
        </div>
    </div>

    <label for="mobile">Mobile Number</label>
    <input type="tel" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
    <span id="mobile-error" class="error-message">Please enter a valid 10-digit mobile number.</span>

    <label for="address">Delivery Address</label>
    <textarea id="address" name="address" placeholder="Enter your delivery address" rows="4" required></textarea>
    <span id="address-error" class="error-message">Please enter your delivery address.</span>

    <button class="btn10" onclick="processPayment()">Continue</button>
</div>

<script>
    const cardDetails = document.querySelector('.card-details10');
    const codDetails = document.querySelector('.cod-details10');
    const creditCardRadio = document.getElementById('credit-card');
    const debitCardRadio = document.getElementById('debit-card');
    const codRadio = document.getElementById('cod');
    const mobileInput = document.getElementById("mobile");
    const mobileError = document.getElementById("mobile-error");
    const addressInput = document.getElementById("address");
    const addressError = document.getElementById("address-error");

    function togglePaymentMethod() {
        if (creditCardRadio.checked || debitCardRadio.checked) {
            cardDetails.style.display = 'block';
            codDetails.style.display = 'none';
        } else {
            cardDetails.style.display = 'none';
            codDetails.style.display = 'block';
        }
    }

    creditCardRadio.addEventListener('change', togglePaymentMethod);
    debitCardRadio.addEventListener('change', togglePaymentMethod);
    codRadio.addEventListener('change', togglePaymentMethod);

    togglePaymentMethod(); // Ensure correct visibility on page load

    function processPayment() {
        let isValid = true;
        const mobile = mobileInput.value.trim();
        const address = addressInput.value.trim();
        const mobileRegex = /^[6-9]\d{9}$/; // Validates a 10-digit Indian mobile number

        // Validate Mobile Number
        if (!mobileRegex.test(mobile)) {
            mobileError.style.display = "block";
            isValid = false;
        } else {
            mobileError.style.display = "none";
        }

        // Validate Address Field
        if (address === "") {
            addressError.style.display = "block";
            isValid = false;
        } else {
            addressError.style.display = "none";
        }

        if (isValid) {
            alert('Payment Successful!');
        }
    }
</script>
</body>
</html>
