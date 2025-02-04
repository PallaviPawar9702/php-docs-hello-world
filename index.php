<?php
// Database Configuration
$host = 'localhost'; // Update with your database host
$username = 'root';  // Update with your database username
$password = '';      // Update with your database password
$dbname = 'student_portal'; // Database name

// Establish connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to handle Course Enrollment
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enroll'])) {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    
    // Insert enrollment data
    $sql = "INSERT INTO enrollments (student_id, course_id) VALUES ('$student_id', '$course_id')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Enrollment successful!";
    } else {
        $message = "Error: " . $conn->error;
    }
}

// Function to handle Attendance
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mark_attendance'])) {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $date = $_POST['date'];
    
    // Insert attendance data
    $sql = "INSERT INTO attendance (student_id, course_id, date) VALUES ('$student_id', '$course_id', '$date')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Attendance marked successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
</head>
<body>
    <h1>Welcome to the Student Portal</h1>
    <nav>
        <a href="#enroll">Enroll in Course</a> |
        <a href="#attendance">Mark Attendance</a>
    </nav>

    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>

    <section id="enroll">
        <h2>Enroll in a Course</h2>
        <form method="POST">
            <label for="student_id">Student ID:</label><br>
            <input type="text" id="student_id" name="student_id" required><br><br>
            
            <label for="course_id">Course ID:</label><br>
            <input type="text" id="course_id" name="course_id" required><br><br>
    
            <input type="submit" name="enroll" value="Enroll">
        </form>
    </section>

    <section id="attendance">
        <h2>Mark Attendance</h2>
        <form method="POST">
            <label for="student_id">Student ID:</label><br>
            <input type="text" id="student_id" name="student_id" required><br><br>
            
            <label for="course_id">Course ID:</label><br>
            <input type="text" id="course_id" name="course_id" required><br><br>
    
            <label for="date">Date:</label><br>
            <input type="date" id="date" name="date" required><br><br>
    
            <input type="submit" name="mark_attendance" value="Mark Attendance">
        </form>
    </section>

    <footer>
        <p>&copy; 2025 Student Portal. All rights reserved.</p>
    </footer>

</body>
</html>

<?php
// Close database connection
$conn->close();
?>

