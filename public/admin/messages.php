<?php
/**
 * admin/messages.php - Messages from the Contact page.
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
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
    <div class="admin-panel"><p class="empty">No messages yet.</p></div> <!-- .admin-panel = white box for tables and forms (admin.css); .empty = grey centred "nothing here" text (style.css part 2) -->
<?php endif; ?>

<?php foreach ($messages as $row): ?>
    <div class="admin-panel message"> <!-- .admin-panel = white box for tables and forms (admin.css); .message = one contact message box (admin.css) -->
        <div class="message-head"> <!-- .message-head = subject on the left, delete on the right (admin.css) -->
            <div>
                <strong><?= e($row['subject']) ?></strong>
                <span>From <?= e($row['name']) ?> (<?= e($row['email']) ?>) on <?= nice_date($row['created_at']) ?></span>
            </div>
            <form method="post" onsubmit="return confirm('Delete this message?');">
                <input type="hidden" name="id" value="<?= e($row['id']) ?>">
                <button type="submit" class="btn btn-danger btn-small">Delete</button> <!-- .btn = basic round button (style.css part 3); .btn-danger = red button for delete (style.css part 3); .btn-small = smaller button (style.css part 3) -->
            </form>
        </div>
        <p><?= nl2br(e($row['message'])) ?></p>
    </div>
<?php endforeach; ?>

<?php require __DIR__ . '/../../app/views/admin-footer.php'; ?>
