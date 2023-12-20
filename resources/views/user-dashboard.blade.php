<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
