
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About the Developer</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #263248;
            margin: 0;
        }

        header {
            background: #1e3a5f;
            color: white;
            padding: 22px 8%;
        }

        nav {
            background: white;
            padding: 18px 8%;
        }

        nav a {
            color: #2563eb;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }

        main {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .about-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            border-left: 5px solid #2563eb;
            box-shadow: 0 3px 12px #0000000d;
            line-height: 1.8;
        }
    </style>
</head>
<body>

    <header>
        <h1>Task Management System</h1>
        <p>About this project</p>
    </header>

    <nav>
        <a href="/">Home</a>
        <a href="/tasks">All Tasks</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>
    </nav>

    <main>
        <div class="about-card">
            <h2>About the Developer</h2>

            <p>
                Hello! My name is Aiver Sam V. Santiago.
                I developed this Task Management System as part
                of my CodeIgniter 4 laboratory activity.
            </p>

            <p>
                This project demonstrates the use of models,
                controllers, views, routes, and database queries
                in a simple web application.
            </p>

            <p>
                The system displays today's tasks, lists all tasks,
                and shows a demo user's profile.
            </p>
        </div>
    </main>

</body>
</html>