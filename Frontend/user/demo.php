<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persistent Order Status Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 600px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px 30px;
        }

        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .status-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            margin: 30px 0;
        }

        .status-bar::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 10%;
            width: 80%;
            height: 4px;
            background: #e0e0e0;
            transform: translateY(-50%);
            z-index: 0;
        }

        .status-step {
            position: relative;
            z-index: 1;
            text-align: center;
            flex: 1;
        }

        .status-circle {
            width: 30px;
            height: 30px;
            background: #e0e0e0;
            border-radius: 50%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #999;
            transition: all 0.3s ease;
        }

        .status-text {
            margin-top: 10px;
            font-size: 14px;
            color: #999;
        }

        .active .status-circle {
            background: #4caf50;
            color: #fff;
        }

        .active .status-text {
            color: #4caf50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Order Status</h2>
        <div class="status-bar">
            <div class="status-step" id="step-1">
                <div class="status-circle"></div>   
                <div class="status-text">Pending</div>
            </div>
            <div class="status-step" id="step-2">
                <div class="status-circle"></div>
                <div class="status-text">Shipped</div>
            </div>
            <div class="status-step" id="step-3">
                <div class="status-circle"></div>
                <div class="status-text">Out for Delivery</div>
            </div>
            <div class="status-step" id="step-4">
                <div class="status-circle"></div>
                <div class="status-text">Delivered</div>
            </div>
        </div>
        <button id="cancelOrder" style="display: block; width: 100%; margin-top: 20px; padding: 10px; background: red: color: white; border: none; cursor: pointer;">Cancel Order</button>
    </div>

    <script>
        const statusSteps = ["Pending", "Shipped", "Out for Delivery", "Delivered", "Cancelled"]; // Status sequence
        const stepElements = ["step-1", "step-2", "step-3", "step-4"];
        
        function updateStatusUI(status){
            document.querySelectorAll(".status-step").forEach(el => el.classList.remove("active"));

            if(status === "Cancelled"){
                alert("Order has been cancelled.");
                return;
            }

            let index = statusSteps.indexOf(status);
            if(index !== -1){
                document.getElementById(stepElements[index]).classList.add("active");
            }
        }

        const urlParams = new URLSearchParams(window.location.search);
        const orderid = urlParams.get("oid");
        function fetchStatus(){
            fetch("get_status.php?oid=${orderid}")
                .then(response => response.json())
                .then(data => updateStatusUI(data.status));
        }

        function cancelOrder(){
            fetch("cancel_order.php")
                .then(response => response.json())
                .then(data => {
                    updateStatusUI(data.status);
                    document.getElementById("cancelOrder").style.display = "none";
                });
        }

        document.getElementById("cancelOrder").addEventListener("click", cancelOrder);

        setInterval(() => {
            fetch("update_status.php").then(() => fetchStatus());
        }, 60000);

        fetchStatus();
    </script>
</body>
</html>
