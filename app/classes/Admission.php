<?php
/**
 * Admission.php
 * Everything about admission applications (the "admissions" table).
 */

class Admission
{
    // Classes a parent can choose in the form
    public const GRADES = [
        'Playgroup', 'Nursery', 'Prep',
        'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5',
        'Grade 6', 'Grade 7', 'Grade 8', 'Grade 9', 'Grade 10',
    ];

    // Status values the admin can set
    public const STATUSES = ['New', 'Contacted', 'Accepted', 'Rejected'];

    /**
     * Check the form data.
     * Returns a list of error messages (empty list = all good).
     */
    public static function validate($data)
    {
        $errors = [];

        if ($data['student_name'] === '') {
            $errors[] = 'Please enter the student name.';
        }
        if ($data['date_of_birth'] === '') {
            $errors[] = 'Please enter the date of birth.';
        }
        if (!in_array($data['grade'], self::GRADES)) {
            $errors[] = 'Please choose a class.';
        }
        if ($data['parent_name'] === '') {
            $errors[] = 'Please enter the parent name.';
        }
        if ($data['phone'] === '') {
            $errors[] = 'Please enter a phone number.';
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address.';
        }

        return $errors;
    }

    public static function create($data)
    {
        $db = Database::connect();

        $sql = 'INSERT INTO admissions (student_name, date_of_birth, grade, parent_name, phone, email, address)
                VALUES (?, ?, ?, ?, ?, ?, ?)';

        $stmt = $db->prepare($sql);
        $stmt->execute([
            $data['student_name'],
            $data['date_of_birth'],
            $data['grade'],
            $data['parent_name'],
            $data['phone'],
            $data['email'],
            $data['address'],
        ]);
    }

    public static function all()
    {
        $db = Database::connect();
        return $db->query('SELECT * FROM admissions ORDER BY created_at DESC')->fetchAll();
    }

    public static function count()
    {
        $db = Database::connect();
        return $db->query('SELECT COUNT(*) FROM admissions')->fetchColumn();
    }

    public static function updateStatus($id, $status)
    {
        if (!in_array($status, self::STATUSES)) {
            return;
        }

        $db = Database::connect();
        $stmt = $db->prepare('UPDATE admissions SET status = ? WHERE id = ?');
        $stmt->execute([$status, $id]);
    }
}
