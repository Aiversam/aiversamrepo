
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Tasks</title>

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
            max-width: 1000px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 25px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 3px 12px #0000000d;
        }

        .status {
            color: #2563eb;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <header>
        <h1>Task Management System</h1>
        <p>Welcome! Here are your tasks for today.</p>
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
        <h2>Today's Tasks</h2>
        <p>Date: <?= date('F j, Y') ?></p>

        <?php $today = date('Y-m-d'); ?>
        <?php $found = false; ?>

        <?php foreach ($tasks as $task): ?>
            <?php if ($task['task_date'] === $today): ?>
                <?php $found = true; ?>

                <div class="card">
                    <h3><?= esc($task['title']) ?></h3>
                    <p>
                        Status:
                        <span class="status">
                            <?= esc($task['status']) ?>
                        </span>
                    </p>
                    <p>Due date: <?= esc($task['task_date']) ?></p>
                </div>

            <?php endif; ?>
        <?php endforeach; ?>

        <?php if (!$found): ?>
            <div class="card">
                <p>No tasks scheduled for today.</p>
            </div>
        <?php endif; ?>
    </main>

</body>
</html>
