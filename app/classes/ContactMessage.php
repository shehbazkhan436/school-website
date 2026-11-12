<?php
/**
 * ContactMessage.php
 * Messages sent from the Contact page (the "messages" table).
 */

class ContactMessage
{
    public static function validate($data)
    {
        $errors = [];

        if ($data['name'] === '') {
            $errors[] = 'Please enter your name.';
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address.';
        }
        if ($data['subject'] === '') {
            $errors[] = 'Please enter a subject.';
        }
        if ($data['message'] === '') {
            $errors[] = 'Please write your message.';
        }

        return $errors;
    }

    public static function create($data)
    {
        $db = Database::connect();

        $stmt = $db->prepare('INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)');
        $stmt->execute([$data['name'], $data['email'], $data['subject'], $data['message']]);
    }

    public static function all()
    {
        $db = Database::connect();
        return $db->query('SELECT * FROM messages ORDER BY created_at DESC')->fetchAll();
    }

    public static function count()
    {
        $db = Database::connect();
        return $db->query('SELECT COUNT(*) FROM messages')->fetchColumn();
    }

    public static function delete($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare('DELETE FROM messages WHERE id = ?');
        $stmt->execute([$id]);
    }
}
