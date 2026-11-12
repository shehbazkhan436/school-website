<?php
/**
 * bootstrap.php
 * Every page includes this file first.
 * It starts the session and loads the settings, helpers and classes.
 */

session_start();

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/helpers.php';

require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/classes/Auth.php';
require_once __DIR__ . '/classes/Admission.php';
require_once __DIR__ . '/classes/ContactMessage.php';
require_once __DIR__ . '/classes/News.php';
require_once __DIR__ . '/classes/Teacher.php';
