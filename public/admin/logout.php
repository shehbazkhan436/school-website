<?php
/**
 * admin/logout.php - Logs the admin out and goes back to the login page
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
require_once __DIR__ . '/../../app/bootstrap.php';

Auth::logout();
redirect('admin/login.php');
