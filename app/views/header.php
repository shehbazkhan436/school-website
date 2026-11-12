<?php
/**
 * header.php
 * Top of every public page: <head>, top bar and menu.
 * Before including it, a page sets $pageTitle.
 */
$pageTitle = $pageTitle ?? 'Home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?> | <?= e(SCHOOL_NAME) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="<?= url('assets/css/style.css') ?>">
    <link rel="icon" href="<?= url('assets/img/logo.svg') ?>">
</head>
<body>

<!-- Top bar: phone, email, timings -->
<div class="topbar">
    <div class="container topbar-inner">
        <span><?= icon('phone') ?> <?= e(SCHOOL_PHONE) ?></span>
        <span><?= icon('mail') ?> <?= e(SCHOOL_EMAIL) ?></span>
        <span class="topbar-hide-mobile"><?= icon('clock') ?> Mon - Fri: 8:00 AM - 2:00 PM</span>
    </div>
</div>

<!-- Main header with logo and menu -->
<header class="header">
    <div class="container header-inner">
        <a href="<?= url('index.php') ?>" class="logo">
            <img src="<?= url('assets/img/logo.svg') ?>" alt="" width="44" height="44">
            <span>
                <strong><?= e(SCHOOL_NAME) ?></strong>
                <small><?= e(SCHOOL_TAGLINE) ?></small>
            </span>
        </a>

        <!-- Mobile menu: the checkbox opens/closes the menu with CSS only (no JavaScript) -->
        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <label for="menu-toggle" class="menu-button" aria-label="Open menu">
            <span></span><span></span><span></span>
        </label>

        <nav class="nav">
            <a href="<?= url('index.php') ?>" class="<?= active('index.php') ?>">Home</a>
            <a href="<?= url('about.php') ?>" class="<?= active('about.php') ?>">About</a>
            <a href="<?= url('academics.php') ?>" class="<?= active('academics.php') ?>">Academics</a>
            <a href="<?= url('teachers.php') ?>" class="<?= active('teachers.php') ?>">Teachers</a>
            <a href="<?= url('news.php') ?>" class="<?= active('news.php') ?>">News</a>
            <a href="<?= url('gallery.php') ?>" class="<?= active('gallery.php') ?>">Gallery</a>
            <a href="<?= url('contact.php') ?>" class="<?= active('contact.php') ?>">Contact</a>
            <a href="<?= url('admissions.php') ?>" class="btn btn-gold btn-small">Apply Now</a>
        </nav>
    </div>
</header>

<main>
