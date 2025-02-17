<?php
    
    include('../../Backend/connection.php');
    include 'navbar.php';
    $uid = $_SESSION['uid'];
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

        .container_product {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
}

        .payment-container10 {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            height: auto;
            margin: 25px;
        }

        .py {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            margin-top: 10px;
        }

        .payment-method10 {
            display: flex;
            flex-direction: row;
            align-items: center;
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
            color: #d9534f;
            font-size: 14px;
            font-weight: bold;
            margin-top: 5px;
            display: none;
            padding: 3px 8px;
            background: rgba(217, 83, 79, 0.1);
            border-left: 3px solid #d9534f;
            border-radius: 3px;
        }



.card {
    margin-top: 80px;
    background: #fff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
    transition: transform 0.3s ease-in-out;
    width: 30%;
}

.card:hover {
    transform: scale(1.05);
}

.card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 8px;
}

.card-content {
    padding: 10px;
}

.product-name {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    margin-bottom: 8px;
}

.price {
    font-size: 16px;
    color: #4CAF50;
    margin-bottom: 5px;
}

    </style>
</head>
<body>


<div class="container_product">
        <?php
            if(isset($_GET['pid']))
            {
                $pid=$_GET['pid'];
                // echo "<script>alert('$pid');</script>";

                $sql = "SELECT pid, pname, image, price, qty, final_order FROM cart WHERE pid=$pid AND uid=$uid";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $price = $row['price'];
                $amount = $row['final_order'];
                $qty = $row['qty'];

                    echo '<div class="card">';
                        // echo '<img src="../../Backend/image1/' . $row['image'] . '" alt="Product Image">';
                        echo '<div class="card-content">';
                            echo '<h2 class="py">Order Summary</h2>';
                            echo '<div class="product-name"><strong>Medicine:</strong>' . $row['pname'] . '</div>';
                            echo '<div class="price"><strong>Price:</strong>₹' . $price . '</div>';
                            echo '<div class="price"><strong>Quantity:</strong>' . $qty . '</div>';
                            echo '<div class="price"><strong>Total Amount:</strong>' . $amount . '</div>';
                        echo '</div>';
                    echo '</div>';
            }
        ?>

    <div class="payment-container10">
        <h2 class="py">Payment Details</h2>
        <form action="" method="post">

            <div class="payment-method10">
        
                <input type="radio" name="payment-method" value="Credit_Card" id="credit-card" checked> <label style="margin-top: 10px;">Credit Card</label>
                <input type="radio" name="payment-method" value="Debit_Card" id="debit-card"><label style="margin-top: 10px;">Debit Card</label>
                <input type="radio" name="payment-method" value="Cash_on_Delivery" id="cod"> <label style="margin-top: 10px;">Cash on Delivery</label>
            </div>
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
            
        <h2 class="py">Contact Details</h2>
        <label for="mobile">Mobile Number</label>
        <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
        <span id="mobile-error" class="error-message">Please enter a valid 10-digit mobile number.</span>

        <label for="address">Delivery Address</label>
        <textarea id="address" name="address" placeholder="Enter your delivery address" rows="4" required></textarea>
        <span id="address-error" class="error-message">Please enter your delivery address.</span>
        <button type="submit" name="comfirm_payment" class="btn10" onclick="processPayment()">Confirm Payment</button>
        </form>
    </div>
</div>

<script>

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const mobileInput = document.getElementById("mobile");
    const mobileError = document.getElementById("mobile-error");

    form.addEventListener("submit", function (event) {
        let isValid = true;
        const mobile = mobileInput.value.trim();
        const mobileRegex = /^[6-9]\d{9}$/;

        // Reset previous error
        mobileError.style.display = "none";

        // Validate mobile number
        if (!mobileRegex.test(mobile)) {
            mobileError.textContent = "Please enter a valid 10-digit mobile number.";
            mobileError.style.display = "block";
            isValid = false;
        }

        // Prevent form submission if validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });
});


    function processPayment(event) {
    event.preventDefault(); // Prevent form submission

    const mobileInput = document.getElementById("mobile");
    const mobileError = document.getElementById("mobile-error");
    const addressInput = document.getElementById("address");
    const addressError = document.getElementById("address-error");

    const mobile = mobileInput.value.trim();
    const address = addressInput.value.trim();
    const mobileRegex = /^[6-9]\d{9}$/;
    let isValid = true;

    // Hide error messages initially
    mobileError.style.display = "none";
    addressError.style.display = "none";

    // Validate mobile number
    if (!mobileRegex.test(mobile)) {
        mobileError.style.display = "block";
        isValid = false;
    }

    // Validate address field
    if (address === "") {
        addressError.style.display = "block";
        isValid = false;
    }

    // If all validations pass, submit the form
    if (isValid) {
        event.target.closest("form").submit();
    }
}

// Attach event listener to the button
document.querySelector(".btn10").addEventListener("click", processPayment);

    function processPayment() {
        e.preventDefault();
        const mobileInput = document.getElementById("mobile");
        const mobileError = document.getElementById("mobile-error");
        const addressInput = document.getElementById("address");
        const addressError = document.getElementById("address-error");
        
        const mobile = mobileInput.value.trim();
        const address = addressInput.value.trim();
        const mobileRegex = /^[6-9]\d{9}$/;
        let isValid = true;
        
        mobileError.style.display = "none";
        addressError.style.display = "none";

        if (!mobileRegex.test(mobile)) {
            mobileError.style.display = "block";
            isValid = false;
        }

        if (address === "") {
            addressError.style.display = "block";
            }    isValid = false;
        
    }

    document.addEventListener("DOMContentLoaded", function () {
    const cardDetails = document.querySelector('.card-details10');
    const codDetails = document.querySelector('.cod-details10');
    const creditCardRadio = document.getElementById('credit-card');
    const debitCardRadio = document.getElementById('debit-card');
    const codRadio = document.getElementById('cod');

    function togglePaymentMethod() {
        if (creditCardRadio.checked || debitCardRadio.checked) {
            cardDetails.style.display = 'block';
            codDetails.style.display = 'none';
        } else {
            cardDetails.style.display = 'none';
            codDetails.style.display = 'block';
        }
    }

    // Add event listeners to radio buttons
    creditCardRadio.addEventListener('change', togglePaymentMethod);
    debitCardRadio.addEventListener('change', togglePaymentMethod);
    codRadio.addEventListener('change', togglePaymentMethod);

    // Call function on page load to set initial visibility
    togglePaymentMethod();
});


</script>

<?php include '../footer.php'; ?>
</body>
</html>
<?php

if (isset($_POST['comfirm_payment'])) {
    $payment_type = $_POST["payment-method"];
    $card_no = $_POST['card-number'];
    $card_holder_name = $_POST['card-holder'];
    $exdate = $_POST['expiry-date'];
    $cvv = $_POST['cvv'];
    $order_date = date('Y-m-d');
    $mobile = $_POST['mobile'];
    $temp_address = $_POST['address'];

    // $sql10 = "SELECT payid FROM payment WHERE  AND uid=$uid";
    // $result10 = mysqli_query($conn,$sql10);

    $payid = 106;

    $sql_name = "SELECT * FROM registration WHERE uid=$uid";
    $result_name = mysqli_query($conn,$sql_name);
    $row = $result_name->fetch_assoc();
    $customer_name = $row['full_name'];
    
    switch($payment_type){
        case "Cash_on_Delivery":{
            $sql = "INSERT INTO `payment` (`uid`,`amout`,`payment_type`) VALUES ('$uid','$amount','$payment_type')";
            $result = mysqli_query($conn,$sql);
            }
            break;
        default:{
            $sql = "INSERT INTO `payment` (`uid`,`amout`,`payment_type`,`card_no`,`exdate`,`cvv`,`card_holder_name`) VALUES ('$uid','$amount','$payment_type','$card_no','$exdate','$cvv','$card_holder_name')";
            $result = mysqli_query($conn,$sql); 
        }break;

    }
            if($result){
            $sql = "UPDATE product SET stock=stock-$qty WHERE pid=$pid";
            $result = mysqli_query($conn,$sql);

            $sql = "INSERT INTO `order_history` (`uid`,`pid`,`order_date`,`price`,`qty`,`total_amount`,`mobile_no`,`payid`,`temp_address`,`customer_name`) VALUES ('$uid','$pid','$order_date','$price','$qty','$amount','$mobile','$payid','$temp_address','$customer_name')";
            $result = mysqli_query($conn,$sql);
   
            echo "<script>
            alert('Thank you for your payment.');
            window.location.href = 'orders.php';
          </script>";

            }
    
}

?>