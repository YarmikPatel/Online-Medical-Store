<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Interface</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .payment-container {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .payment-method {
            margin-bottom: 30px;
        }

        .payment-method label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        .payment-method input[type="radio"] {
            margin-right: 10px;
            transform: scale(1.2);
            accent-color: #4CAF50; /* Modern way to color radio buttons */
        }

        .card-details, .cod-details {
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"], input[type="password"] {
            width: 100%; /* Inputs take full width within their container */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.2);
        }

        .input-group {
            display: flex;
            gap: 10px; /* Consistent gap between inputs */
        }

        .input-group input[type="text"], .input-group input[type="password"] {
            width: calc(50% - 5px); /* Adjust width for the gap */
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

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease; /* Smooth transition */
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn:active {
            background: #3e8e41;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) inset;
        }
    </style>
</head>
<body>

<div class="payment-container">
    <h2>Payment Interface</h2>

    <div class="payment-method">
        <label>
            <input type="radio" name="payment-method" id="pay-card" checked> Pay with Card
        </label>
        <div class="card-details">
            <div class="input-group">
                <input type="text" placeholder="Card Number" required>
                <input type="text" placeholder="Card Holder Name" required>
            </div>
            <div class="input-group">
                <input type="date" placeholder="MM/YY" required>
                <input type="password" placeholder="CVV" required>
            </div>
        </div>
    </div>

    <div class="payment-method">
        <label>
            <input type="radio" name="payment-method" id="cod"> Cash on Delivery
        </label>
        <div class="cod-details" style="display: none;">
            <p>You will pay when you receive the goods.</p>
        </div>
    </div>

    <label for="address">Delivery Address</label>
    <textarea id="address" placeholder="Enter your delivery address" rows="4" required></textarea>

    <button class="btn" onclick="processPayment()">Continue</button>
</div>

<script>
    const cardDetails = document.querySelector('.card-details');
    const codDetails = document.querySelector('.cod-details');
    const payCardRadio = document.getElementById('pay-card'); // Use getElementById
    const codRadio = document.getElementById('cod');       // Use getElementById

    payCardRadio.addEventListener('change', () => {
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