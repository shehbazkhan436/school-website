<?php
/**
 * admin/admissions.php - All admission applications.
 * The admin can change the status (New, Contacted, Accepted, Rejected).
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
require_once __DIR__ . '/../../app/bootstrap.php';
Auth::requireLogin();

// The status form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    Admission::updateStatus((int) post('id'), post('status'));
    set_flash('success', 'Status updated.');
    redirect('admin/admissions.php');
}

$pageTitle = 'Admissions';
$admissions = Admission::all();

require __DIR__ . '/../../app/views/admin-header.php';
?>

<div class="admin-panel"> <!-- .admin-panel = white box for tables and forms (admin.css) -->
    <?php if (empty($admissions)): ?>
        <p class="empty">No applications yet.</p> <!-- .empty = grey centred "nothing here" text (style.css part 2) -->
    <?php else: ?>
        <div class="table-wrap"> <!-- .table-wrap = lets the table scroll sideways on small screens (admin.css) -->
            <table class="table"> <!-- .table = clean table with lines between rows (admin.css) -->
                <tr>
                    <th>Date</th><th>Student</th><th>Date of birth</th><th>Class</th>
                    <th>Parent</th><th>Phone</th><th>Email</th><th>Status</th>
                </tr>
                <?php foreach ($admissions as $row): ?>
                    <tr>
                        <td><?= nice_date($row['created_at']) ?></td>
                        <td><?= e($row['student_name']) ?></td>
                        <td><?= nice_date($row['date_of_birth']) ?></td>
                        <td><?= e($row['grade']) ?></td>
                        <td><?= e($row['parent_name']) ?></td>
                        <td><?= e($row['phone']) ?></td>
                        <td><?= e($row['email']) ?></td>
                        <td>
                            <form method="post" class="inline-form"> <!-- .inline-form = select + button in one row (admin.css) -->
                                <input type="hidden" name="id" value="<?= e($row['id']) ?>">
                                <select name="status">
                                    <?php foreach (Admission::STATUSES as $status): ?>
                                        <option <?= $row['status'] === $status ? 'selected' : '' ?>><?= e($status) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="submit" class="btn btn-primary btn-small">Save</button> <!-- .btn = basic round button (style.css part 3); .btn-primary = navy button (style.css part 3); .btn-small = smaller button (style.css part 3) -->
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/../../app/views/admin-footer.php'; ?>
