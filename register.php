<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "attendance_db";

// Connect to DB
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $enrollment_number = $_POST['enrollment_number'];
    $mac_address = $_POST['mac_address'];

    if (empty($student_name) || empty($enrollment_number) || empty($mac_address)) {
        $error = "All fields are required!";
    } else {
        $student_name = $conn->real_escape_string($student_name);
        $enrollment_number = $conn->real_escape_string($enrollment_number);
        $mac_address = $conn->real_escape_string($mac_address);

        $sql = "INSERT INTO students (student_name, enrollment_number, mac_address) 
                VALUES ('$student_name', '$enrollment_number', '$mac_address')";

        if ($conn->query($sql) === TRUE) {
            $success = "Registration successful!";
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:rgb(94, 119, 146);
            opacity: 0.95;
            background: url(register.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            

        }
        .container {
            background: rgb(255, 255, 255);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;

        }

        h2 {
            background-color: lightgreen;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
        .form-header p {
            color: lightgreen;
            padding: 10px;
            font-size: 14px;
            margin: 0;
        }
        input {
            width: 90%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
        button {
            background: hotpink;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background: #ff6699;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Attendance Registration</h2>
    <div class="form-header"><p><b>Register Your Device for Attendance</b></p></div>

    <?php if (isset($success)) echo "<p class='success'>$success</p>"; ?>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST" action="">
        <label>Student Name:</label>
        <input type="text" name="student_name" placeholder="Enter student name" required>

        <label>Enrollment Number:</label>
        <input type="text" name="enrollment_number" placeholder="Enter enrollment number" required>

        <label>MAC Address:</label>
        <input type="text" name="mac_address" id="mac_address" placeholder="Enter MAC address" required onkeyup="autofillDetails()">


        <button type="submit" class="btn-register">Register</button>
    </form>

    <p>Already registered? <a href="login.php" >Login</a></p>
</div>
<script>
function autofillDetails() {
    const mac = document.getElementById("mac_address").value;

    if (mac.length >= 5) {
        fetch("fetch_student.php?mac=" + mac)
            .then(response => response.json())
            .then(data => {
                if (data.student_name) {
                    document.getElementById("student_name").value = data.student_name;
                    document.getElementById("enrollment_number").value = data.enrollment_number;
                }
            });
    }
}
</script>

</body>
</html>
