<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Feedback Matters</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333; /* Example color */
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

    <h1>Your Feedback Matters - Help Us Improve!</h1>

    <p>We value your opinions and are committed to providing the best possible pharmacy experience. Your feedback helps us understand what we're doing well and where we can improve.</p>

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


    <textarea id="comments" name="comments" placeholder="What did you like or dislike about your recent experience? How can we improve our services? Is there anything else you'd like to share with us?"></textarea>

    <input type="text" id="name" name="name" placeholder="Name (Optional)">
    <input type="email" id="email" name="email" placeholder="Email (Optional)">

    <button onclick="submitFeedback()">Submit Feedback</button>

    <div class="thank-you" id="thankYouMessage">Thank you for your feedback! We appreciate your input.</div>

    <script>
        const stars = document.querySelectorAll('.star');
        const overallRating = document.getElementById('overall');
        const thankYouMessage = document.getElementById('thankYouMessage');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const rating = parseInt(star.dataset.rating);
                overallRating.value = rating;

                stars.forEach(s => {
                    if (parseInt(s.dataset.rating) <= rating) {
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                    }
                });
            });
        });

        function submitFeedback() {
            // Here you would typically send the feedback data to your server
            // using AJAX or a form submission.  For this example, we'll
            // just show the thank you message.

            thankYouMessage.style.display = 'block';

            // Reset form fields (optional)
            document.getElementById('comments').value = '';
            document.getElementById('name').value = '';
            document.getElementById('email').value = '';
            overallRating.value = 0;
            stars.forEach(s => s.classList.remove('active')); // Reset stars
        }
    </script>

</body>
</html>