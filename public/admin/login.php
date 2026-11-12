<?php
/**
 * admin/login.php - Admin login page
 * Default login: admin / admin123
 */
require_once __DIR__ . '/../../app/bootstrap.php';

// Already logged in? Go to the dashboard.
if (Auth::check()) {
    redirect('admin/index.php');
}

$error = '';
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = post('username');
    $password = post('password');

    if (Auth::login($username, $password)) {
        redirect('admin/index.php');
    }

    $error = 'Wrong username or password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | <?= e(SCHOOL_NAME) ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="<?= url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/css/admin.css') ?>">
</head>
<body class="login-body">

<div class="form-card login-card">
    <img src="<?= url('assets/img/logo.svg') ?>" alt="" width="56" height="56">
    <h1>Staff Login</h1>
    <p><?= e(SCHOOL_NAME) ?> admin area</p>

    <?php if ($error !== ''): ?>
        <div class="alert alert-error"><?= e($error) ?></div>
    <?php endif; ?>

    <form method="post" action="<?= url('admin/login.php') ?>">
        <label>Username
            <input type="text" name="username" value="<?= e($username) ?>" required autofocus>
        </label>
        <label>Password
            <input type="password" name="password" required>
        </label>
        <button type="submit" class="btn btn-primary btn-block">Log In</button>
    </form>

    <a href="<?= url('index.php') ?>" class="back-link">&larr; Back to website</a>
</div>

</body>
</html>
