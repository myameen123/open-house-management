// resources/views/welcome.blade.php

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open House - Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }

        nav {
            background-color: #eee;
            padding: 10px;
        }

        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Open House</h1>
    </header>

    <nav>
        <a href="/">Home</a>
        <a href="/user-dashboard">User Dashboard</a>
        <a href="/student/evaluators">View Assigned Evaluators</a>
        <a href="/student/project/1/assessment">View Project Assessment</a>
        <!-- Add more links based on your routes -->
    </nav>

    <div class="container">
        <h2>Welcome to Open House!</h2>
        <p>This is the homepage content. You can navigate to different sections using the links above.</p>
    </div>
</body>
</html>
