<?php
/**
 * admin-header.php
 * Top of every admin page: side menu.
 * Before including it, a page sets $pageTitle.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?> | Admin | <?= e(SCHOOL_NAME) ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="<?= url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/css/admin.css') ?>">
    <link rel="icon" href="<?= url('assets/img/logo.svg') ?>">
</head>
<body class="admin-body"> <!-- .admin-body = sidebar + main side by side (admin.css) -->

<aside class="admin-sidebar"> <!-- .admin-sidebar = dark menu on the left (admin.css) -->
    <a href="<?= url('admin/index.php') ?>" class="logo logo-light"> <!-- .logo = logo image + school name in a row (style.css part 4); .logo-light = white school name, for dark backgrounds (style.css part 4) -->
        <img src="<?= url('assets/img/logo.svg') ?>" alt="" width="36" height="36">
        <span><strong>School Admin</strong></span>
    </a>

    <nav class="admin-nav"> <!-- .admin-nav = admin menu links (admin.css) -->
        <a href="<?= url('admin/index.php') ?>" class="<?= active('index.php') ?>"><?= icon('monitor') ?> Dashboard</a>
        <a href="<?= url('admin/admissions.php') ?>" class="<?= active('admissions.php') ?>"><?= icon('cap') ?> Admissions</a>
        <a href="<?= url('admin/messages.php') ?>" class="<?= active('messages.php') ?>"><?= icon('mail') ?> Messages</a>
        <a href="<?= url('admin/news.php') ?>" class="<?= active('news.php') ?>"><?= icon('calendar') ?> News &amp; Events</a>
        <a href="<?= url('index.php') ?>" target="_blank"><?= icon('arrow') ?> View Website</a>
        <a href="<?= url('admin/logout.php') ?>"><?= icon('shield') ?> Logout</a>
    </nav>
</aside>

<div class="admin-main"> <!-- .admin-main = main admin area on the right (admin.css) -->
    <div class="admin-topbar"> <!-- .admin-topbar = page title + hello text (admin.css) -->
        <h1><?= e($pageTitle) ?></h1>
        <span>Hello, <strong><?= e($_SESSION['admin_name']) ?></strong></span>
    </div>

    <?php show_flash(); ?>
