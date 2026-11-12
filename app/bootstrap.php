<?php
/**
 * bootstrap.php
 * Every page includes this file first (look for the "BOOTSTRAP:" comment at the top of each page).
 * It starts the session and loads the settings, helpers and classes.
 */

// Start the session so we can remember things between pages (admin login, flash messages)
session_start();

// Settings: database login, BASE_URL, school name, phone, email
require_once __DIR__ . '/config.php';

// Small helper functions: e(), url(), redirect(), set_flash(), show_flash(), post(), icon()...
require_once __DIR__ . '/helpers.php';

// Classes (one per database table). After this, any page can use e.g. News::latest()
require_once __DIR__ . '/classes/Database.php';       // PDO connection to MySQL
require_once __DIR__ . '/classes/Auth.php';           // admin login / logout
require_once __DIR__ . '/classes/Admission.php';      // admissions table
require_once __DIR__ . '/classes/ContactMessage.php'; // messages table
require_once __DIR__ . '/classes/News.php';           // news table
require_once __DIR__ . '/classes/Teacher.php';        // teachers table
