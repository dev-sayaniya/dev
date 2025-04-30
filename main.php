<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Tracking System</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f9;
        }

        /* Header and Navbar */
        header {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
        }

        header h1 {
            margin: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 15px;
        }

        .navbar a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #0056b3;
        }

        /* Main Content */
        main {
            padding: 20px;
        }

        #welcome {
            text-align: center;
            margin-bottom: 20px;
        }

        #welcome h2 {
            font-size: 2rem;
            color: #007BFF;
        }

        #features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .feature-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-card h3 {
            margin-bottom: 10px;
            color: #007BFF;
        }

        .feature-card p {
            color: #666;
        }

        /* Footer */
        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Attendance Tracking System</h1>
        <nav class="navbar">
            <ul>
                <li><a href="./registration_page.html"></a><li>
                <li><a href="./home.html">Home</a></li>
                <li><a href="./date_sheet_page.html">Attendance_Logs</a></li>
                <li><a href="./profile_page.html">Profile</a></li>
                <li><a href="./logout.html">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="welcome">
            <h2>Welcome Back!</h2>
            <p>Track attendance seamlessly with our system using MAC address recognition.</p>
        </section>

        <section id="features">
            <div class="feature-card">
                <h3 button onclick="navigateToPage1()"></button>Attendance Logs</h3>
                <p>View and manage real-time attendance logs of employees.</p>
            </div>
            <div class="feature-card">
                <h3>MAC Address Tracking</h3>
                <p>Ensure accurate tracking with device-specific MAC address recognition.</p>
            </div>
            <div class="feature-card">
                <h3 button onclick="navigateToPage()"></button>User Management</h3>
                
                <p>Manage employee profiles and attendance records with ease.</p>
                

    <script>
        function navigateToPage() {
            window.location.href = "./management.html"; // Replace with your target URL
        }
        function navigateToPage1() {
            window.location.href = "./log.html"; // Replace with your target URL
        }
    </script>
                
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Attendance Tracking System. All rights reserved.</p>
    </footer>
</body>
</html>
