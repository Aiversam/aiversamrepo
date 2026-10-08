<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff login</title>
    <style>
        body{font:16px Arial,sans-serif;background:#f4f7fb;color:#263248;margin:0}header{background:#1e3a5f;color:#fff;padding:22px 8%}main{max-width:440px;margin:50px auto;padding:0 20px}.card{background:#fff;padding:26px;border-radius:10px}label{display:block;font-weight:bold;margin:18px 0 6px}input{box-sizing:border-box;width:100%;padding:11px;border:1px solid #cbd5e1;border-radius:5px}.error{padding:12px;background:#fee2e2;color:#991b1b;border-radius:6px}.button{margin-top:20px;background:#2563eb;color:#fff;padding:11px 16px;border:0;border-radius:5px;cursor:pointer}
    </style>
</head>
<body>
<header><h1>Staff login</h1><p>Sign in to manage customer and user accounts.</p></header>
<main><section class="card">
    <?php if (! empty($error)): ?><p class="error"><?= esc($error) ?></p><?php endif ?>
    <form action="<?= site_url('login') ?>" method="post">
        <?= csrf_field() ?>
        <label for="username">Username</label>
        <input id="username" name="username" type="text" maxlength="100" required autocomplete="username" value="<?= esc(old('username', ''), 'attr') ?>">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" required autocomplete="current-password">
        <button class="button" type="submit">Log in</button>
    </form>
</section></main>
</body>
</html>
