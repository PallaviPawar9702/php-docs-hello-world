<?php
// Handle Contact Form Submission
$message_sent = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Simple Email Configuration (Replace with your email)
    $to = "your-email@example.com";
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $message_sent = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #6a82fb, #fc5c7d);
            color: #333;
            overflow-x: hidden;
        }

        h1 {
            font-size: 3.5em;
            text-align: center;
            color: white;
            margin-top: 80px;
            font-weight: 600;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: scale(1.05);
        }

        /* Course List */
        .course-list {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .course-item {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            width: 30%;
            box-sizing: border-box;
            text-align: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .course-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .course-item h3 {
            color: #fc5c7d;
            font-size: 1.9em;
            font-weight: 600;
        }

        .course-item p {
            font-size: 1.1em;
            color: #555;
            line-height: 1.5;
        }

        .course-item a {
            display: inline-block;
            background-color: #fc5c7d;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .course-item a:hover {
            background-color: #6a82fb;
        }

        /* Contact Form */
        .form-container {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        .form-container h2 {
            text-align: center;
            font-size: 2.5em;
            color: #fc5c7d;
            font-weight: 600;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-container input,
        .form-container textarea {
            padding: 18px;
            font-size: 1.1em;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-sizing: border-box;
            resize: vertical;
            transition: border 0.3s ease;
        }

        .form-container input:focus,
        .form-container textarea:focus {
            border: 1px solid #fc5c7d;
            outline: none;
        }

        .form-container input[type="submit"] {
            background-color: #6a82fb;
            color: white;
            font-size: 1.3em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
            padding: 15px;
            border-radius: 10px;
        }

        .form-container input[type="submit"]:hover {
            background-color: #fc5c7d;
        }

        .form-container .message-success {
            color: green;
            text-align: center;
            font-size: 1.2em;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .course-item {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <h1>Welcome to Our E-Learning Platform</h1>

    <div class="container">
        <h2>Our Popular Courses</h2>
        <div class="course-list">
            <div class="course-item">
                <h3>Web Development</h3>
                <p>Learn HTML, CSS, JavaScript, and PHP. Build amazing websites and web applications.</p>
                <a href="#">Learn More</a>
            </div>
            <div class="course-item">
                <h3>Machine Learning</h3>
                <p>Get started with AI, Data Science, and Deep Learning. Transform data into insights.</p>
                <a href="#">Learn More</a>
            </div>
            <div class="course-item">
                <h3>Cybersecurity</h3>
                <p>Learn to protect systems, networks, and programs from digital attacks and threats.</p>
                <a href="#">Learn More</a>
            </div>
        </div>
    </div>

    <div class="container form-container" id="contact">
        <h2>Contact Us</h2>
        <?php if ($message_sent): ?>
            <p class="message-success">Message sent successfully! We'll get back to you soon.</p>
        <?php endif; ?>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="message">Message:</label>
            <textarea name="message" rows="5" required></textarea>

            <input type="submit" name="submit" value="Send Message">
        </form>
    </div>

</body>
</html>
