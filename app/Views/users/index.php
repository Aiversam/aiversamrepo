<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Accounts</title>
    <style>
        body{font:16px Arial,sans-serif;background:#f4f7fb;color:#263248;margin:0}header,th{background:#1e3a5f;color:#fff}header,main{padding:22px max(20px,8%)}nav{background:#fff;padding:16px max(20px,8%)}nav a{margin-right:18px;color:#2563eb;text-decoration:none;font-weight:bold}main{max-width:1000px;margin:25px auto}.card{background:#fff;padding:22px;border-radius:10px;overflow:auto}table{width:100%;border-collapse:collapse}th,td{text-align:left;padding:12px;border-bottom:1px solid #e2e8f0;vertical-align:middle}a.button{display:inline-block;background:#2563eb;color:white;padding:10px 14px;border-radius:6px;text-decoration:none}.avatar{width:56px;height:56px;object-fit:cover;border-radius:50%}.notice{padding:12px;background:#dcfce7;color:#166534;border-radius:6px}
    </style>
</head>
<body>
<header><h1>User Accounts</h1><p>Manage users and their profile pictures.</p></header>
<nav><a href="<?= site_url('/') ?>">Home</a><a href="<?= site_url('customers') ?>">Customers</a><a href="<?= site_url('users') ?>">Users</a><a href="<?= site_url('tasks') ?>">Tasks</a></nav>
<main>
    <p><a class="button" href="<?= site_url('users/new') ?>">Add user</a></p>
    <?php if (session()->getFlashdata('success')): ?><p class="notice"><?= esc(session()->getFlashdata('success')) ?></p><?php endif ?>
    <section class="card">
        <table><thead><tr><th>Avatar</th><th>Username</th><th>Full name</th><th>Email</th><th>Action</th></tr></thead><tbody>
        <?php if ($users === []): ?><tr><td colspan="5">No users found.</td></tr><?php endif ?>
        <?php foreach ($users as $user): ?>
            <?php $avatarFile = basename((string) ($user['avatar'] ?? '')); $avatarPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $avatarFile; $avatarUrl = $avatarFile !== '' && is_file($avatarPath) ? base_url('uploads/' . rawurlencode($avatarFile)) : base_url('uploads/avatar-placeholder.svg'); ?>
            <tr><td><img class="avatar" src="<?= esc($avatarUrl, 'attr') ?>" alt="<?= esc($user['full_name']) ?> avatar"></td>
                <td><?= esc($user['username']) ?></td><td><?= esc($user['full_name']) ?></td><td><?= esc($user['email'] ?? '') ?></td>
                <td><a href="<?= site_url('users/edit/' . $user['id']) ?>">Edit</a></td></tr>
        <?php endforeach ?>
        </tbody></table>
    </section>
</main>
</body>
</html>
