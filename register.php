<?php
$host = "localhost";
$user = "root";  // Change if using a different database user
$password = "";  // Set your database password if applicable
$database = "attendance_db";

// Connect to database
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $enrollment_number = $_POST['enrollment_number'];
    $mac_address = $_POST['mac_address'];

    // Validate fields
    if (empty($student_name) || empty($enrollment_number) || empty($mac_address)) {
        $error = "All fields are required!";
    } else {
        // Prevent SQL injection
        $student_name = $conn->real_escape_string($student_name);
        $enrollment_number = $conn->real_escape_string($enrollment_number);
        $mac_address = $conn->real_escape_string($mac_address);

        // Insert into database
        $sql = "INSERT INTO students (student_name, enrollment_number, mac_address) 
                VALUES ('$student_name', '$enrollment_number', '$mac_address')";

        if ($conn->query($sql) === TRUE) 
        {
            $success = "Registration successful!";
        } 
        else 
        {
            $error = "Error: " . $conn->error;
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        h2 {
            background-color: darkgreen;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
        from-header p{
            color:lightgreen;
            padding: 10px;
            font-size:14px;
            margin:0px


        }
        input {
            width: 100%;
            padding: 10px;
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
       <p><b>  Register Your Device for Attendance</b></p>
        
        
        <form method="POST" action="">
            <label>Student Name:</label>
            <input type="text" name="student_name" id="student_name" placeholder="Enter student name" required>

            <label>Enrollment Number:</label>
            <input type="text" name="enrollment_number" id="enrollment_number" placeholder="Enter enrollment number" required>

            <label>MAC Address:</label>
            <input type="text" name="mac_address" id="mac_address" placeholder="Enter MAC address (e.g., 00:11:22:33:44:55)" required>

            <button onclick="document.location='default.asp'" class="btn-register"  >Register </a></button> 

        </form>

            
        </form>

        <p>Already registered? <a href="login.php">Login</a></p>
    </div>
   

</body>
</html>
