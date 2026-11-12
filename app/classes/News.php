<?php
/**
 * News.php
 * News and events (the "news" table).
 */

class News
{
    public const CATEGORIES = ['News', 'Event', 'Admissions'];

    /**
     * Get news items, newest first.
     * Pass a number to get only that many (example: News::latest(3)).
     */
    public static function latest($limit = 50)
    {
        $db = Database::connect();

        $stmt = $db->prepare('SELECT * FROM news ORDER BY event_date DESC LIMIT ?');
        $stmt->bindValue(1, (int) $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function find($id)
    {
        $db = Database::connect();

        $stmt = $db->prepare('SELECT * FROM news WHERE id = ?');
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public static function count()
    {
        $db = Database::connect();
        return $db->query('SELECT COUNT(*) FROM news')->fetchColumn();
    }

    public static function validate($data)
    {
        $errors = [];

        if ($data['title'] === '') {
            $errors[] = 'Please enter a title.';
        }
        if (!in_array($data['category'], self::CATEGORIES)) {
            $errors[] = 'Please choose a category.';
        }
        if ($data['summary'] === '') {
            $errors[] = 'Please enter a short summary.';
        }
        if ($data['body'] === '') {
            $errors[] = 'Please write the full text.';
        }
        if ($data['event_date'] === '') {
            $errors[] = 'Please choose a date.';
        }

        return $errors;
    }

    public static function create($data)
    {
        $db = Database::connect();

        $stmt = $db->prepare('INSERT INTO news (title, category, summary, body, event_date) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$data['title'], $data['category'], $data['summary'], $data['body'], $data['event_date']]);
    }

    public static function update($id, $data)
    {
        $db = Database::connect();

        $stmt = $db->prepare('UPDATE news SET title = ?, category = ?, summary = ?, body = ?, event_date = ? WHERE id = ?');
        $stmt->execute([$data['title'], $data['category'], $data['summary'], $data['body'], $data['event_date'], $id]);
    }

    public static function delete($id)
    {
        $db = Database::connect();

        $stmt = $db->prepare('DELETE FROM news WHERE id = ?');
        $stmt->execute([$id]);
    }
}
