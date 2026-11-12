<?php
/**
 * Database.php
 * Opens ONE connection to MySQL using PDO and shares it.
 *
 * Use it like this:
 *     $db = Database::connect();
 */

class Database
{
    // The saved connection (empty until the first call)
    private static $pdo = null;

    public static function connect()
    {
        // Already connected? Give back the same connection.
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';

        try {
            self::$pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // show errors
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // rows as arrays
            ]);
        } catch (PDOException $error) {
            die('Database connection failed. Did you import database/school.sql? Error: ' . $error->getMessage());
        }

        return self::$pdo;
    }
}
