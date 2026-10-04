<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?></title>
    <style>
        body{font:16px Arial,sans-serif;background:#f4f7fb;color:#263248;margin:0}header{background:#1e3a5f;color:#fff;padding:22px 8%}nav{background:#fff;padding:16px 8%}nav a{margin-right:18px;color:#2563eb;text-decoration:none;font-weight:bold}main{max-width:700px;margin:35px auto;padding:0 20px}.card{background:#fff;padding:26px;border-radius:10px}label{display:block;font-weight:bold;margin:18px 0 6px}input{box-sizing:border-box;width:100%;padding:11px;border:1px solid #cbd5e1;border-radius:5px}.error{color:#b91c1c;margin:5px 0}.button{margin-top:20px;background:#2563eb;color:#fff;padding:11px 16px;border:0;border-radius:5px;cursor:pointer}.avatar{width:96px;height:96px;object-fit:cover;border-radius:50%}
    </style>
</head>
<body>
<header><h1><?= esc($title) ?></h1></header>
<nav><a href="<?= site_url('customers') ?>">Customers</a><a href="<?= site_url('users') ?>">Users</a></nav>
<main><section class="card">
    <form action="<?= esc($action, 'attr') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <label for="username">Username</label>
        <input id="username" name="username" type="text" maxlength="100" required value="<?= esc($user['username'] ?? '', 'attr') ?>">
        <?php if ($validation && $validation->hasError('username')): ?><p class="error"><?= esc($validation->getError('username')) ?></p><?php endif ?>

        <label for="full_name">Full name</label>
        <input id="full_name" name="full_name" type="text" maxlength="255" required value="<?= esc($user['full_name'] ?? '', 'attr') ?>">
        <?php if ($validation && $validation->hasError('full_name')): ?><p class="error"><?= esc($validation->getError('full_name')) ?></p><?php endif ?>

        <label for="email">Email (optional)</label>
        <input id="email" name="email" type="email" maxlength="255" value="<?= esc($user['email'] ?? '', 'attr') ?>">
        <?php if ($validation && $validation->hasError('email')): ?><p class="error"><?= esc($validation->getError('email')) ?></p><?php endif ?>

        <?php if (! empty($user['avatar'])): ?>
            <?php $currentAvatar = basename((string) $user['avatar']); ?>
            <p>Current avatar</p><img class="avatar" src="<?= esc(base_url('uploads/' . rawurlencode($currentAvatar)), 'attr') ?>" alt="Current user avatar">
        <?php endif ?>
        <label for="avatar">Profile picture (JPG or PNG, up to 2 MB)</label>
        <input id="avatar" name="avatar" type="file" accept="image/jpeg,image/png">
        <?php if ($validation && $validation->hasError('avatar')): ?><p class="error"><?= esc($validation->getError('avatar')) ?></p><?php endif ?>
        <?php if (! empty($uploadError)): ?><p class="error"><?= esc($uploadError) ?></p><?php endif ?>

        <button class="button" type="submit">Save user</button>
        <a href="<?= site_url('users') ?>">Cancel</a>
    </form>
</section></main>
</body>
</html>
