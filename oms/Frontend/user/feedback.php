<?php
include('../../Backend/connection.php');
include 'user_session.php';
include 'navbar.php';
$uid = $_SESSION['uid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Feedback Matters</title>
    <style>
                body {
            font-family: sans-serif;
            margin: 0p;
            padding: 0;
            box-sizing: border-box;
        }
        .container{
            margin: 110px auto;
            padding: 20px 110px;
        }
        h1 {
            color: #333; /* Example color */
            text-align: center;
        }
        p{
            padding: 10px 0;
        }
        .rating {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .rating label {
            margin-right: 10px;
        }
        .rating input[type="radio"] {
            display: none; /* Hide default radio buttons */
        }
        .star {
            font-size: 24px;
            color: gray;
            cursor: pointer;
        }
        .star:hover,
        .star.active {
            color: gold; /* Highlighted star color */
        }
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            resize: vertical; /* Allow vertical resizing */
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #007bff; /* Example button color */
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
        .thank-you {
            display: none; /* Initially hidden */
            margin-top: 10px;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Feedback Matters - Help Us Improve!</h1>
        <p>We value your opinions and are committed to providing the best possible pharmacy experience. Your feedback helps us understand what we're doing well and where we can improve.</p>

        <form action="" method="post">
            <textarea id="msg" name="msg" placeholder="What did you like or dislike about your recent experience? How can we improve our services?" rows="4" required></textarea>
            <input type="email" id="email" name="email_id" placeholder="Email Id">

            <div class="rating">
                <label for="overall">Overall Satisfaction:</label>
                <div class="stars">
                    <span class="star" data-rating="1">&#9733;</span>
                    <span class="star" data-rating="2">&#9733;</span>
                    <span class="star" data-rating="3">&#9733;</span>
                    <span class="star" data-rating="4">&#9733;</span>
                    <span class="star" data-rating="5">&#9733;</span>
                </div>
                <input type="hidden" id="overall" name="overall_rating" value="0">
            </div>

            <button type="submit" name="submit_feedback">Submit Feedback</button>
            <div class="thank-you" id="thankYouMessage" style="display: none; color: green; margin-top: 10px;">Thank you for your feedback! We appreciate your input.</div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stars = document.querySelectorAll('.star');
            const overallRating = document.getElementById('overall');
            const thankYouMessage = document.getElementById('thankYouMessage');

            stars.forEach(star => {
                star.addEventListener('click', () => {
                    const rating = parseInt(star.dataset.rating);
                    overallRating.value = rating;

                    stars.forEach(s => {
                        s.classList.toggle('active', parseInt(s.dataset.rating) <= rating);
                    });
                });
            });
        });
    </script>
</body>
</html>

<?php
if (isset($_POST['submit_feedback'])) {
    $email_id = mysqli_real_escape_string($conn, $_POST['email_id']);
    $msg = mysqli_real_escape_string($conn, $_POST['msg']);
    $star = (int)$_POST['overall_rating'];
    $current_date = date("Y-m-d");

    $sql = "INSERT INTO feedback (`uid`, `date`, `email_id`, `msg`, `star`) VALUES ('$uid', '$current_date', '$email_id', '$msg', '$star')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>document.getElementById('thankYouMessage').style.display = 'block';</script>";
    } else {
        echo "<script>alert('Something went wrong: " . mysqli_error($conn) . "');</script>";
    }
}
?>