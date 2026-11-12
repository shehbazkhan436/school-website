<?php
/**
 * config.php
 * All settings for the website live here.
 * These values work with a normal XAMPP install.
 */

// Database settings (XAMPP default: user "root", no password)
define('DB_HOST', 'localhost');
define('DB_NAME', 'school_website');
define('DB_USER', 'root');
define('DB_PASS', '');

// The address of the "public" folder in your browser.
// If your folder is C:\xampp\htdocs\school-website, keep this as it is.
define('BASE_URL', '/school-website/public');

// School details (used in the header, footer and contact page)
define('SCHOOL_NAME', 'Model Public High School');
define('SCHOOL_TAGLINE', 'Learn today. Lead tomorrow.');
define('SCHOOL_PHONE', '+92 311 9118919');
define('SCHOOL_EMAIL', 'info@modelschool.edu.pk');
define('SCHOOL_ADDRESS', 'Maini Ada, Maini (Swabi)');
