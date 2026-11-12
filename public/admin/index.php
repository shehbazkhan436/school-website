<?php
/**
 * admin/index.php - Dashboard with totals and the latest applications
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
require_once __DIR__ . '/../../app/bootstrap.php';
Auth::requireLogin();

$pageTitle = 'Dashboard';
$latestAdmissions = array_slice(Admission::all(), 0, 5);

require __DIR__ . '/../../app/views/admin-header.php';
?>

<div class="admin-cards"> <!-- .admin-cards = 3 total boxes in a row (admin.css) -->
    <a href="<?= url('admin/admissions.php') ?>" class="admin-card"> <!-- .admin-card = one total box (admin.css) -->
        <span><?= icon('cap') ?></span>
        <strong><?= Admission::count() ?></strong>
        Admission applications
    </a>
    <a href="<?= url('admin/messages.php') ?>" class="admin-card"> <!-- .admin-card = one total box (admin.css) -->
        <span><?= icon('mail') ?></span>
        <strong><?= ContactMessage::count() ?></strong>
        Contact messages
    </a>
    <a href="<?= url('admin/news.php') ?>" class="admin-card"> <!-- .admin-card = one total box (admin.css) -->
        <span><?= icon('calendar') ?></span>
        <strong><?= News::count() ?></strong>
        News &amp; events
    </a>
</div>

<div class="admin-panel"> <!-- .admin-panel = white box for tables and forms (admin.css) -->
    <h2>Latest applications</h2>

    <?php if (empty($latestAdmissions)): ?>
        <p class="empty">No applications yet.</p> <!-- .empty = grey centred "nothing here" text (style.css part 2) -->
    <?php else: ?>
        <table class="table"> <!-- .table = clean table with lines between rows (admin.css) -->
            <tr><th>Student</th><th>Class</th><th>Parent</th><th>Phone</th><th>Status</th></tr>
            <?php foreach ($latestAdmissions as $row): ?>
                <tr>
                    <td><?= e($row['student_name']) ?></td>
                    <td><?= e($row['grade']) ?></td>
                    <td><?= e($row['parent_name']) ?></td>
                    <td><?= e($row['phone']) ?></td>
                    <td><span class="status status-<?= e(strtolower($row['status'])) ?>"><?= e($row['status']) ?></span></td> <!-- .status = coloured status pill (admin.css); .status- = colour by status: new, contacted, accepted, rejected (admin.css) -->
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/../../app/views/admin-footer.php'; ?>
