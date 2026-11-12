<?php
/**
 * admin/admissions.php - All admission applications.
 * The admin can change the status (New, Contacted, Accepted, Rejected).
 */
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

<div class="admin-panel">
    <?php if (empty($admissions)): ?>
        <p class="empty">No applications yet.</p>
    <?php else: ?>
        <div class="table-wrap">
            <table class="table">
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
                            <form method="post" class="inline-form">
                                <input type="hidden" name="id" value="<?= e($row['id']) ?>">
                                <select name="status">
                                    <?php foreach (Admission::STATUSES as $status): ?>
                                        <option <?= $row['status'] === $status ? 'selected' : '' ?>><?= e($status) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="submit" class="btn btn-primary btn-small">Save</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/../../app/views/admin-footer.php'; ?>
