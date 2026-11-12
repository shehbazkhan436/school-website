<?php
/**
 * admin/news.php - List of news and events, with Edit and Delete buttons.
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
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

<div class="admin-panel"> <!-- .admin-panel = white box for tables and forms (admin.css) -->
    <a href="<?= url('admin/news-form.php') ?>" class="btn btn-gold btn-small">+ Add News</a> <!-- .btn = basic round button (style.css part 3); .btn-gold = gold button (style.css part 3); .btn-small = smaller button (style.css part 3) -->

    <table class="table"> <!-- .table = clean table with lines between rows (admin.css) -->
        <tr><th>Date</th><th>Title</th><th>Category</th><th></th></tr>
        <?php foreach ($allNews as $row): ?>
            <tr>
                <td><?= nice_date($row['event_date']) ?></td>
                <td><?= e($row['title']) ?></td>
                <td><span class="tag"><?= e($row['category']) ?></span></td> <!-- .tag = small blue pill label (style.css part 3) -->
                <td class="actions"> <!-- .actions = Edit and Delete buttons in one row (admin.css) -->
                    <a href="<?= url('admin/news-form.php?id=' . $row['id']) ?>" class="btn btn-primary btn-small">Edit</a> <!-- .btn = basic round button (style.css part 3); .btn-primary = navy button (style.css part 3); .btn-small = smaller button (style.css part 3) -->
                    <form method="post" onsubmit="return confirm('Delete this news item?');">
                        <input type="hidden" name="id" value="<?= e($row['id']) ?>">
                        <button type="submit" class="btn btn-danger btn-small">Delete</button> <!-- .btn = basic round button (style.css part 3); .btn-danger = red button for delete (style.css part 3); .btn-small = smaller button (style.css part 3) -->
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php require __DIR__ . '/../../app/views/admin-footer.php'; ?>
