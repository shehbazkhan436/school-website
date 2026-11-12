<?php
/**
 * Teacher.php
 * Teachers shown on the Teachers page (the "teachers" table).
 */

class Teacher
{
    public static function all()
    {
        $db = Database::connect();
        return $db->query('SELECT * FROM teachers ORDER BY id')->fetchAll();
    }

    /**
     * Get the first letters of a name for the round avatar.
     * Example: "Ayesha Malik" gives "AM".
     */
    public static function initials($name)
    {
        $initials = '';

        foreach (explode(' ', $name) as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
        }

        return substr($initials, 0, 2);
    }
}
