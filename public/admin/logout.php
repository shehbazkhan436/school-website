<?php
/**
 * admin/logout.php - Logs the admin out and goes back to the login page
 */
require_once __DIR__ . '/../../app/bootstrap.php';

Auth::logout();
redirect('admin/login.php');
