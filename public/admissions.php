<?php
/**
 * admissions.php - Online admission form
 * Saves the form into the "admissions" table.
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
require_once __DIR__ . '/../app/bootstrap.php';

$errors = [];

// Empty form values (so the inputs have something to show the first time)
$form = [
    'student_name'  => '',
    'date_of_birth' => '',
    'grade'         => '',
    'parent_name'   => '',
    'phone'         => '',
    'email'         => '',
    'address'       => '',
];

// The form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read every field from the form
    foreach ($form as $field => $value) {
        $form[$field] = post($field);
    }

    $errors = Admission::validate($form);

    if (empty($errors)) {
        Admission::create($form);
        set_flash('success', 'Thank you! Your application has been received. We will call you within 2 working days.');
        redirect('admissions.php');
    }
}

$pageTitle = 'Admissions';
$pageIntro = 'Apply online for Playgroup to Grade 10. It takes about 2 minutes.';

require __DIR__ . '/../app/views/header.php';
require __DIR__ . '/../app/views/page-hero.php';
?>

<section class="section"> <!-- .section = a page block with 80px space top and bottom (style.css part 2) -->
    <div class="container split split-form"> <!-- .container = centres the content, max 1180px wide (style.css part 2); .split = 2 equal columns side by side (style.css part 2); .split-form = 2 columns, both start at the top (style.css part 2) -->
        <div>
            <span class="eyebrow">How to apply</span> <!-- .eyebrow = small gold UPPERCASE text above a heading (style.css part 2) -->
            <h2>3 easy steps</h2>
            <ol class="steps"> <!-- .steps = numbered list with gold circles (style.css part 6) -->
                <li><strong>Fill the form</strong> Send us the student and parent details.</li>
                <li><strong>Meet us</strong> Our office calls you to set a short meeting and test.</li>
                <li><strong>Join the class</strong> Submit the documents and fee, and your child starts.</li>
            </ol>

            <div class="info-box"> <!-- .info-box = grey info box (style.css part 6) -->
                <h3>Documents needed</h3>
                <ul class="check-list"> <!-- .check-list = list with green tick icons (style.css part 3) -->
                    <li><?= icon('check') ?> Birth certificate (B-Form)</li>
                    <li><?= icon('check') ?> Parent CNIC copy</li>
                    <li><?= icon('check') ?> 2 passport size photos</li>
                    <li><?= icon('check') ?> Last school result (if any)</li>
                </ul>
            </div>
        </div>

        <div class="form-card"> <!-- .form-card = white form box with shadow (style.css part 7) -->
            <h2>Admission Form</h2>

            <?php show_flash(); ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-error"> <!-- .alert = message box (style.css part 3); .alert-error = red message box for errors (style.css part 3) -->
                    <?php foreach ($errors as $error): ?>
                        <div><?= e($error) ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= url('admissions.php') ?>">
                <div class="form-row"> <!-- .form-row = 2 inputs side by side (style.css part 7) -->
                    <label>Student name *
                        <input type="text" name="student_name" value="<?= e($form['student_name']) ?>" required>
                    </label>
                    <label>Date of birth *
                        <input type="date" name="date_of_birth" value="<?= e($form['date_of_birth']) ?>" required>
                    </label>
                </div>

                <label>Class applying for *
                    <select name="grade" required>
                        <option value="">Choose a class</option>
                        <?php foreach (Admission::GRADES as $grade): ?>
                            <option value="<?= e($grade) ?>" <?= $form['grade'] === $grade ? 'selected' : '' ?>><?= e($grade) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <div class="form-row"> <!-- .form-row = 2 inputs side by side (style.css part 7) -->
                    <label>Parent / guardian name *
                        <input type="text" name="parent_name" value="<?= e($form['parent_name']) ?>" required>
                    </label>
                    <label>Phone *
                        <input type="tel" name="phone" value="<?= e($form['phone']) ?>" placeholder="03XX XXXXXXX" required>
                    </label>
                </div>

                <label>Email *
                    <input type="email" name="email" value="<?= e($form['email']) ?>" required>
                </label>

                <label>Home address
                    <textarea name="address" rows="2"><?= e($form['address']) ?></textarea>
                </label>

                <button type="submit" class="btn btn-primary btn-block">Submit Application</button> <!-- .btn = basic round button (style.css part 3); .btn-primary = navy button (style.css part 3); .btn-block = full width button (style.css part 3) -->
            </form>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
