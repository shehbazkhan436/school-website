<?php
/**
 * admin/messages.php - Messages from the Contact page.
 */
require_once __DIR__ . '/../../app/bootstrap.php';
Auth::requireLogin();

// The delete button was clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ContactMessage::delete((int) post('id'));
    set_flash('success', 'Message deleted.');
    redirect('admin/messages.php');
}

$pageTitle = 'Messages';
$messages = ContactMessage::all();

require __DIR__ . '/../../app/views/admin-header.php';
?>

<?php if (empty($messages)): ?>
    <div class="admin-panel"><p class="empty">No messages yet.</p></div>
<?php endif; ?>

<?php foreach ($messages as $row): ?>
    <div class="admin-panel message">
        <div class="message-head">
            <div>
                <strong><?= e($row['subject']) ?></strong>
                <span>From <?= e($row['name']) ?> (<?= e($row['email']) ?>) on <?= nice_date($row['created_at']) ?></span>
            </div>
            <form method="post" onsubmit="return confirm('Delete this message?');">
                <input type="hidden" name="id" value="<?= e($row['id']) ?>">
                <button type="submit" class="btn btn-danger btn-small">Delete</button>
            </form>
        </div>
        <p><?= nl2br(e($row['message'])) ?></p>
    </div>
<?php endforeach; ?>

<?php require __DIR__ . '/../../app/views/admin-footer.php'; ?>
