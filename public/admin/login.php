<?php
/**
 * admin/login.php - Admin login page
 * Default login: admin / admin123
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
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
<body class="login-body"> <!-- .login-body = blue full screen background (admin.css) -->

<div class="form-card login-card"> <!-- .form-card = white form box with shadow (style.css part 7); .login-card = centred login box (admin.css) -->
    <img src="<?= url('assets/img/logo.svg') ?>" alt="" width="56" height="56">
    <h1>Staff Login</h1>
    <p><?= e(SCHOOL_NAME) ?> admin area</p>

    <?php if ($error !== ''): ?>
        <div class="alert alert-error"><?= e($error) ?></div> <!-- .alert = message box (style.css part 3); .alert-error = red message box for errors (style.css part 3) -->
    <?php endif; ?>

    <form method="post" action="<?= url('admin/login.php') ?>">
        <label>Username
            <input type="text" name="username" value="<?= e($username) ?>" required autofocus>
        </label>
        <label>Password
            <input type="password" name="password" required>
        </label>
        <button type="submit" class="btn btn-primary btn-block">Log In</button> <!-- .btn = basic round button (style.css part 3); .btn-primary = navy button (style.css part 3); .btn-block = full width button (style.css part 3) -->
    </form>

    <a href="<?= url('index.php') ?>" class="back-link">&larr; Back to website</a> <!-- .back-link = small link under the login box (admin.css) -->
</div>

</body>
</html>
