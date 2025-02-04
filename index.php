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
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #ff7e5f, #feb47b);
            color: #333;
        }

        h1 {
            font-size: 3em;
            text-align: center;
            color: white;
            margin-top: 50px;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
            border: 2px solid #ff7e5f;
            border-radius: 10px;
            padding: 20px;
            width: 30%;
            box-sizing: border-box;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .course-item h3 {
            color: #ff7e5f;
            font-size: 1.8em;
        }

        .course-item p {
            font-size: 1.1em;
            color: #555;
        }

        .course-item a {
            display: inline-block;
            background-color: #ff7e5f;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .course-item a:hover {
            background-color: #feb47b;
        }

        /* Contact Form */
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        .form-container h2 {
            text-align: center;
            font-size: 2em;
            color: #ff7e5f;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-container input,
        .form-container textarea {
            padding: 15px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-sizing: border-box;
            resize: vertical;
        }

        .form-container input[type="submit"] {
            background-color: #ff7e5f;
            color: white;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
        }

        .form-container input[type="submit"]:hover {
            background-color: #feb47b;
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
                <p>Learn HTML, CSS, JavaScript, and PHP</p>
                <a href="#">Learn More</a>
            </div>
            <div class="course-item">
                <h3>Machine Learning</h3>
                <p>Get started with AI and Deep Learning</p>
                <a href="#">Learn More</a>
            </div>
            <div class="course-item">
                <h3>Cybersecurity</h3>
                <p>Protect yourself and organizations from cyber threats</p>
                <a href="#">Learn More</a>
            </div>
        </div>
        <a href="#contact" class="button">Contact Us</a>
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
            <textarea name="message" rows="4" required></textarea>

            <input type="submit" name="submit" value="Send Message">
        </form>
    </div>

</body>
</html>
