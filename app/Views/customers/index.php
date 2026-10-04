<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customers</title>
    <style>
        body{font:16px Arial,sans-serif;background:#f4f7fb;color:#263248;margin:0}header,th{background:#1e3a5f;color:#fff}header,main{padding:22px max(20px,8%)}nav{background:#fff;padding:16px max(20px,8%)}nav a{margin-right:18px;color:#2563eb;text-decoration:none;font-weight:bold}main{max-width:1000px;margin:25px auto}.card{background:#fff;padding:22px;border-radius:10px;overflow:auto}table{width:100%;border-collapse:collapse}th,td{text-align:left;padding:12px;border-bottom:1px solid #e2e8f0}a.button{display:inline-block;background:#2563eb;color:white;padding:10px 14px;border-radius:6px;text-decoration:none} .notice{padding:12px;background:#dcfce7;color:#166534;border-radius:6px}
    </style>
</head>
<body>
<header><h1>Customer Accounts</h1><p>Create and update customer records.</p></header>
<nav><a href="<?= site_url('/') ?>">Home</a><a href="<?= site_url('customers') ?>">Customers</a><a href="<?= site_url('users') ?>">Users</a><a href="<?= site_url('tasks') ?>">Tasks</a></nav>
<main>
    <p><a class="button" href="<?= site_url('customers/new') ?>">Add customer</a></p>
    <?php if (session()->getFlashdata('success')): ?><p class="notice"><?= esc(session()->getFlashdata('success')) ?></p><?php endif ?>
    <section class="card">
        <table><thead><tr><th>Full name</th><th>Email</th><th>Action</th></tr></thead><tbody>
        <?php if ($customers === []): ?><tr><td colspan="3">No customers found.</td></tr><?php endif ?>
        <?php foreach ($customers as $customer): ?><tr>
            <td><?= esc($customer['full_name']) ?></td><td><?= esc($customer['email']) ?></td>
            <td><a href="<?= site_url('customers/edit/' . $customer['id']) ?>">Edit</a></td>
        </tr><?php endforeach ?>
        </tbody></table>
    </section>
</main>
</body>
</html>
