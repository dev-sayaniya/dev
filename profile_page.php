<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "attendance_db";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Option 1: Get last registered student
$sql = "SELECT * FROM students ORDER BY id DESC LIMIT 1";

// Option 2: If you want to fetch by a fixed MAC address:
// $sql = "SELECT * FROM students WHERE mac_address = '00:11:22:33:44:55'";

$result = $conn->query($sql);
$student = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            opacity: 0.95;
            background: url(profile.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            
        }
        .profile-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 0px 12px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #007bff;
        }
        .profile-item {
            margin: 20px 0;
        }
        .profile-item label {
            font-weight: bold;
        }
        .profile-item div {
            padding: 15px;
            background:rgb(255, 255, 255);
            border-radius: 30px;
            border: 3px solid #ccc;
        }
    </style>
</head>
<body>

<div class="profile-box">
    <h2>Student Profile</h2>
    
    <?php if ($student): ?>
        <div class="profile-item">
            <label>Name:</label>
            <div><?php echo htmlspecialchars($student['student_name']); ?></div>
        </div>
        <div class="profile-item">
            <label>Enrollment Number:</label>
            <div><?php echo htmlspecialchars($student['enrollment_number']); ?></div>
        </div>
        <div class="profile-item">
            <label>MAC Address:</label>
            <div><?php echo htmlspecialchars($student['mac_address']); ?></div>
        </div>
    <?php else: ?>
        <p style="color: red; text-align: center;">No student found in the database.</p>
    <?php endif; ?>

</div>

</body>
</html>
