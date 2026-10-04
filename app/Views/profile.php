
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>

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
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .profile-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #0000000d;
        }

        .profile-card p {
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        strong {
            color: #1e3a5f;
        }
    </style>
</head>
<body>

    <header>
        <h1>Task Management System</h1>
        <p>Developer and user profile</p>
    </header>

    <nav>
        <a href="/">Home</a>
        <a href="/tasks">All Tasks</a>
        <a href="/profile">Profile</a>
        <a href="/customers">Customers</a>
        <a href="/users">Users</a>
        <a href="/about">About</a>
    </nav>

    <main>
        <div class="profile-card">
            <h2>My Profile</h2>

            <p>
                <strong>Username:</strong>
                <?= esc($user['username']) ?>
            </p>

            <p>
                <strong>Full Name:</strong>
                <?= esc($user['full_name']) ?>
            </p>

            <p>
                <strong>Email:</strong>
                <?= esc($user['email']) ?>
            </p>
        </div>
    </main>

</body>
</html>
