<?php
/**
 * admin/news.php - List of news and events, with Edit and Delete buttons.
 */
require_once __DIR__ . '/../../app/bootstrap.php';
Auth::requireLogin();

// The delete button was clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    News::delete((int) post('id'));
    set_flash('success', 'News item deleted.');
    redirect('admin/news.php');
}

$pageTitle = 'News & Events';
$allNews = News::latest();

require __DIR__ . '/../../app/views/admin-header.php';
?>

<div class="admin-panel">
    <a href="<?= url('admin/news-form.php') ?>" class="btn btn-gold btn-small">+ Add News</a>

    <table class="table">
        <tr><th>Date</th><th>Title</th><th>Category</th><th></th></tr>
        <?php foreach ($allNews as $row): ?>
            <tr>
                <td><?= nice_date($row['event_date']) ?></td>
                <td><?= e($row['title']) ?></td>
                <td><span class="tag"><?= e($row['category']) ?></span></td>
                <td class="actions">
                    <a href="<?= url('admin/news-form.php?id=' . $row['id']) ?>" class="btn btn-primary btn-small">Edit</a>
                    <form method="post" onsubmit="return confirm('Delete this news item?');">
                        <input type="hidden" name="id" value="<?= e($row['id']) ?>">
                        <button type="submit" class="btn btn-danger btn-small">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php require __DIR__ . '/../../app/views/admin-footer.php'; ?>
