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
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(90deg, #ff9a9e, #fad0c4);
            text-align: center;
            padding: 20px;
            color: #333;
        }
        h1 { color: white; font-size: 2.5em; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .button {
            background-color: #ff6f61; color: white; padding: 10px 20px;
            border: none; border-radius: 5px; cursor: pointer;
            text-decoration: none; font-size: 1.2em;
        }
        .button:hover { background-color: #e65b55; }
        input, textarea { width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px; }
        form { text-align: left; }
    </style>
</head>
<body>

    <h1>Welcome to Our E-Learning Platform</h1>

    <div class="container">
        <h2>Our Popular Courses</h2>
        <ul>
            <li><strong>Web Development</strong> - Learn HTML, CSS, JavaScript, and PHP</li>
            <li><strong>Machine Learning</strong> - Get started with AI and Deep Learning</li>
            <li><strong>Cybersecurity</strong> - Protect yourself and organizations from cyber threats</li>
        </ul>
        <a href="#contact" class="button">Contact Us</a>
    </div>

    <div class="container" id="contact">
        <h2>Contact Us</h2>
        <?php if ($message_sent): ?>
            <p style="color: green;">Message sent successfully! We'll get back to you soon.</p>
        <?php endif; ?>
        <form method="post">
            <label>Name:</label>
            <input type="text" name="name" required>
           
            <label>Email:</label>
            <input type="email" name="email" required>
           
            <label>Message:</label>
            <textarea name="message" rows="4" required></textarea>

            <input type="submit" name="submit" value="Send Message" class="button">
        </form>
    </div>

</body>
</html>
