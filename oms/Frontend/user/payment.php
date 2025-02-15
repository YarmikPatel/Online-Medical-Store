<?php
    session_start();
    if(!isset($_SESSION['uid'])){
        die('user not logged in. UID not found in session');
    }
    include('../../Backend/connection.php');
    include 'navbar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
            /* display: flex;*/
            /* justify-content: center; */
            /* align-items: center; */
            height: 100vh; 
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
            display: inline-block; /* Make labels inline */
            margin-right: 20px; /* Add space between labels */
            margin-bottom: 10px; /* Keep some vertical margin for alignment */
            font-weight: bold;
            color: #555;
        }

        .payment-method10 input[type="radio"] {
            margin-right: 5px; /* Reduce space after radio button */
            transform: scale(1.2);
            accent-color: #4CAF50;
        }

        .card-details10, .cod-details10 {
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"], input[type="password"], input[type="month"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="text"]:focus, input[type="password"]:focus, input[type="month"]:focus, input[type="tel"]:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.2);
        }

        .input-group10 {
            display: flex;
            gap: 10px;
        }

        .input-group10 input[type="text"], .input-group input[type="password"], .input-group input[type="month"], .input-group input[type="tel"] {
            width: calc(50% - 5px);
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            resize: vertical;
        }

        textarea:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.2);
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
    </style>



</head>
<body>

<div class="payment-container10">
    <h2 class="py">Payment Comfirm here</h2>

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
                <input type="text" placeholder="Card Number" required>
                <input type="text" placeholder="Card Holder Name" required>
            </div>
            <div class="input-group10">
                <input type="month" placeholder="MM/YY" required>
                <input type="password" placeholder="CVV" required>
            </div>
        </div>

        <div class="cod-details10" style="display: none;">
            <p>You will pay when you receive the goods.</p>
        </div>
    </div>

    <label for="mobile">Mobile Number</label>
    <input type="tel" id="mobile" placeholder="Enter your mobile number" required>

    <label for="address">Delivery Address</label>
    <textarea id="address" placeholder="Enter your delivery address" rows="4" required></textarea>

    <button class="btn10" onclick="processPayment()">Continue</button>
</div>

<script>
    const cardDetails = document.querySelector('.card-details');
    const codDetails = document.querySelector('.cod-details');
    const creditCardRadio = document.getElementById('credit-card');
    const debitCardRadio = document.getElementById('debit-card');
    const codRadio = document.getElementById('cod');

    creditCardRadio.addEventListener('change', () => {
        cardDetails.style.display = 'block';
        codDetails.style.display = 'none';
    });

    debitCardRadio.addEventListener('change', () => {
        cardDetails.style.display = 'block';
        codDetails.style.display = 'none';
    });

    codRadio.addEventListener('change', () => {
        cardDetails.style.display = 'none';
        codDetails.style.display = 'block';
    });

    function processPayment() {
        alert('Payment Successful!');
    }
</script>
</body>
</html>