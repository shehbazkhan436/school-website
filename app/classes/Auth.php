<?php
/**
 * Auth.php
 * Admin login, logout and "is someone logged in?" checks.
 */

class Auth
{
    /**
     * Check the username and password.
     * Returns true when they are correct.
     */
    public static function login($username, $password)
    {
        $db = Database::connect();

        $stmt = $db->prepare('SELECT * FROM admins WHERE username = ?');
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            session_regenerate_id(true);
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['username'];
            return true;
        }

        return false;
    }

    public static function logout()
    {
        unset($_SESSION['admin_id'], $_SESSION['admin_name']);
    }

    public static function check()
    {
        return isset($_SESSION['admin_id']);
    }

    /**
     * Put this at the top of every admin page.
     * Sends visitors to the login page if they are not logged in.
     */
    public static function requireLogin()
    {
        if (!self::check()) {
            redirect('admin/login.php');
        }
    }
}
