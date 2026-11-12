<?php
/**
 * admin/news-form.php - Add a new news item, or edit one.
 *   Add:  news-form.php
 *   Edit: news-form.php?id=3
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
require_once __DIR__ . '/../../app/bootstrap.php';
Auth::requireLogin();

$id = (int) ($_GET['id'] ?? 0);
$errors = [];

// Empty form for "Add"
$form = [
    'title'      => '',
    'category'   => 'News',
    'summary'    => '',
    'body'       => '',
    'event_date' => date('Y-m-d'),
];

// "Edit": fill the form with the saved values
if ($id > 0) {
    $saved = News::find($id);

    if (!$saved) {
        redirect('admin/news.php');
    }

    foreach ($form as $field => $value) {
        $form[$field] = $saved[$field];
    }
}

// The form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($form as $field => $value) {
        $form[$field] = post($field);
    }

    $errors = News::validate($form);

    if (empty($errors)) {
        if ($id > 0) {
            News::update($id, $form);
            set_flash('success', 'News item updated.');
        } else {
            News::create($form);
            set_flash('success', 'News item added.');
        }

        redirect('admin/news.php');
    }
}

$pageTitle = $id > 0 ? 'Edit News' : 'Add News';

require __DIR__ . '/../../app/views/admin-header.php';
?>

<div class="admin-panel admin-form"> <!-- .admin-panel = white box for tables and forms (admin.css); .admin-form = form max 760px wide (admin.css) -->
    <?php if (!empty($errors)): ?>
        <div class="alert alert-error"> <!-- .alert = message box (style.css part 3); .alert-error = red message box for errors (style.css part 3) -->
            <?php foreach ($errors as $error): ?>
                <div><?= e($error) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <label>Title *
            <input type="text" name="title" value="<?= e($form['title']) ?>" required>
        </label>

        <div class="form-row"> <!-- .form-row = 2 inputs side by side (style.css part 7) -->
            <label>Category *
                <select name="category">
                    <?php foreach (News::CATEGORIES as $category): ?>
                        <option <?= $form['category'] === $category ? 'selected' : '' ?>><?= e($category) ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label>Date *
                <input type="date" name="event_date" value="<?= e($form['event_date']) ?>" required>
            </label>
        </div>

        <label>Short summary * (shown on the cards)
            <input type="text" name="summary" value="<?= e($form['summary']) ?>" maxlength="255" required>
        </label>

        <label>Full text *
            <textarea name="body" rows="8" required><?= e($form['body']) ?></textarea>
        </label>

        <button type="submit" class="btn btn-primary">Save</button> <!-- .btn = basic round button (style.css part 3); .btn-primary = navy button (style.css part 3) -->
        <a href="<?= url('admin/news.php') ?>" class="btn btn-outline">Cancel</a> <!-- .btn = basic round button (style.css part 3); .btn-outline = white button with grey border (style.css part 3) -->
    </form>
</div>

<?php require __DIR__ . '/../../app/views/admin-footer.php'; ?>
