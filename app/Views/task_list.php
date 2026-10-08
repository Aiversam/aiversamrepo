
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tasks</title>

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

        nav form { display: inline; margin: 0; }
        nav button.logout { border: 0; border-radius: 6px; background: #1e3a5f; color: #fff; padding: 9px 14px; font: bold 14px Arial, sans-serif; cursor: pointer; }
        nav button.logout:hover { background: #2563eb; }

        main {
            max-width: 1000px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .table-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #1e3a5f;
            color: white;
        }

        tr:hover {
            background: #f8fafc;
        }
    </style>
</head>
<body>

    <header>
        <h1>Task Management System</h1>
        <p>View and organize all your tasks.</p>
    </header>

    <nav>
        <a href="/">Home</a>
        <a href="/tasks">All Tasks</a>
        <a href="/profile">Profile</a>
        <a href="/customers">Customers</a>
        <a href="/users">Users</a>
        <a href="/about">About</a>
        <?php if (session()->get('user_id')): ?>
            <form action="<?= site_url('logout') ?>" method="post">
                <?= csrf_field() ?>
                <button class="logout" type="submit">Log out</button>
            </form>
        <?php endif ?>
    </nav>

    <main>
        <h2>All Tasks</h2>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Task Title</th>
                        <th>Status</th>
                        <th>Task Date</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= esc($task['title']) ?></td>
                            <td><?= esc($task['status']) ?></td>
                            <td><?= esc($task['task_date']) ?></td>
                        </tr>
                    <?php endforeach; ?>

                    <?php if (count($tasks) === 0): ?>
                        <tr>
                            <td colspan="3">No tasks found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
