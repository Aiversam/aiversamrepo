<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?></title>
    <style>
        body{font:16px Arial,sans-serif;background:#f4f7fb;color:#263248;margin:0}header{background:#1e3a5f;color:#fff;padding:22px 8%}nav{background:#fff;padding:16px 8%}nav a{margin-right:18px;color:#2563eb;text-decoration:none;font-weight:bold}nav form{display:inline;margin:0}nav button.logout{border:0;border-radius:6px;background:#1e3a5f;color:#fff;padding:9px 14px;font:bold 14px Arial,sans-serif;cursor:pointer;transition:background .15s ease}nav button.logout:hover{background:#2563eb}nav button.logout:focus-visible{outline:3px solid #93c5fd;outline-offset:2px}main{max-width:700px;margin:35px auto;padding:0 20px}.card{background:#fff;padding:26px;border-radius:10px}label{display:block;font-weight:bold;margin:18px 0 6px}input{box-sizing:border-box;width:100%;padding:11px;border:1px solid #cbd5e1;border-radius:5px}.error{color:#b91c1c;margin:5px 0}.button{margin-top:20px;background:#2563eb;color:#fff;padding:11px 16px;border:0;border-radius:5px;cursor:pointer}
    </style>
</head>
<body>
<header><h1><?= esc($title) ?></h1></header>
<nav><a href="<?= site_url('/') ?>">Home</a><a href="<?= site_url('tasks') ?>">All Tasks</a><a href="<?= site_url('profile') ?>">Profile</a><a href="<?= site_url('customers') ?>">Customers</a><a href="<?= site_url('users') ?>">Users</a><a href="<?= site_url('about') ?>">About</a><form action="<?= site_url('logout') ?>" method="post"><?= csrf_field() ?><button class="logout" type="submit">Log out</button></form></nav>
<main><section class="card">
    <form action="<?= esc($action, 'attr') ?>" method="post">
        <?= csrf_field() ?>
        <label for="full_name">Full name</label>
        <input id="full_name" name="full_name" type="text" maxlength="255" required value="<?= esc($customer['full_name'] ?? '', 'attr') ?>">
        <?php if ($validation && $validation->hasError('full_name')): ?><p class="error"><?= esc($validation->getError('full_name')) ?></p><?php endif ?>

        <label for="email">Email</label>
        <input id="email" name="email" type="email" maxlength="255" required value="<?= esc($customer['email'] ?? '', 'attr') ?>">
        <?php if ($validation && $validation->hasError('email')): ?><p class="error"><?= esc($validation->getError('email')) ?></p><?php endif ?>

        <button class="button" type="submit">Save customer</button>
        <a href="<?= site_url('customers') ?>">Cancel</a>
    </form>
</section></main>
</body>
</html>
