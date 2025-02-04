<?php
// Database Configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_portal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Add Student
    if (isset($_POST['add_student'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "INSERT INTO students (name, email) VALUES ('$name', '$email')";
        if ($conn->query($sql) === TRUE) {
            $message = "New student added successfully!";
        } else {
            $message = "Error: " . $conn->error;
        }
    }
    // Add Course
    if (isset($_POST['add_course'])) {
        $course_name = $_POST['course_name'];
        $course_code = $_POST['course_code'];
        $sql = "INSERT INTO courses (course_name, course_code) VALUES ('$course_name', '$course_code')";
        if ($conn->query($sql) === TRUE) {
            $message = "New course added successfully!";
        } else {
            $message = "Error: " . $conn->error;
        }
    }
    // Enroll Student
    if (isset($_POST['enroll_student'])) {
        $student_id = $_POST['student_id'];
        $course_id = $_POST['course_id'];
        $sql = "INSERT INTO enrollments (student_id, course_id) VALUES ('$student_id', '$course_id')";
        if ($conn->query($sql) === TRUE) {
            $message = "Student enrolled successfully!";
        } else {
            $message = "Error: " . $conn->error;
        }
    }
    // Mark Attendance
    if (isset($_POST['mark_attendance'])) {
        $student_id = $_POST['student_id'];
        $course_id = $_POST['course_id'];
        $attendance_date = $_POST['attendance_date'];
        $sql = "INSERT INTO attendance (student_id, course_id, attendance_date) VALUES ('$student_id', '$course_id', '$attendance_date')";
        if ($conn->query($sql) === TRUE) {
            $message = "Attendance marked successfully!";
        } else {
            $message = "Error: " . $conn->error;
        }
    }
}

// Fetch Students
$students_result = $conn->query("SELECT * FROM students");
// Fetch Courses
$courses_result = $conn->query("SELECT * FROM courses");
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

    <!-- Display Messages -->
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>

    <!-- Add Student Form -->
    <h2>Add New Student</h2>
    <form method="POST">
        <label for="name">Student Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Student Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" name="add_student" value="Add Student">
    </form>
    <hr>

    <!-- Add Course Form -->
    <h2>Add New Course</h2>
    <form method="POST">
        <label for="course_name">Course Name:</label><br>
        <input type="text" id="course_name" name="course_name" required><br><br>
        <label for="course_code">Course Code:</label><br>
        <input type="text" id="course_code" name="course_code" required><br><br>
        <input type="submit" name="add_course" value="Add Course">
    </form>
    <hr>

    <!-- Enroll Student Form -->
    <h2>Enroll Student in Course</h2>
    <form method="POST">
        <label for="student_id">Select Student:</label><br>
        <select name="student_id" required>
            <?php while ($student = $students_result->fetch_assoc()) { ?>
                <option value="<?php echo $student['id']; ?>"><?php echo $student['name']; ?></option>
            <?php } ?>
        </select><br><br>

        <label for="course_id">Select Course:</label><br>
        <select name="course_id" required>
            <?php while ($course = $courses_result->fetch_assoc()) { ?>
                <option value="<?php echo $course['id']; ?>"><?php echo $course['course_name']; ?></option>
            <?php } ?>
        </select><br><br>

        <input type="submit" name="enroll_student" value="Enroll Student">
    </form>
    <hr>

    <!-- Mark Attendance Form -->
    <h2>Mark Student Attendance</h2>
    <form method="POST">
        <label for="student_id">Select Student:</label><br>
        <select name="student_id" required>
            <?php while ($student = $students_result->fetch_assoc()) { ?>
                <option value="<?php echo $student['id']; ?>"><?php echo $student['name']; ?></option>
            <?php } ?>
        </select><br><br>

        <label for="course_id">Select Course:</label><br>
        <select name="course_id" required>
            <?php while ($course = $courses_result->fetch_assoc()) { ?>
                <option value="<?php echo $course['id']; ?>"><?php echo $course['course_name']; ?></option>
            <?php } ?>
        </select><br><br>

        <label for="attendance_date">Attendance Date:</label><br>
        <input type="date" name="attendance_date" required><br><br>

        <input type="submit" name="mark_attendance" value="Mark Attendance">
    </form>
    <hr>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
