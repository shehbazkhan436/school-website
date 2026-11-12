<?php
/**
 * admissions.php - Online admission form
 * Saves the form into the "admissions" table.
 */
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

<section class="section">
    <div class="container split split-form">
        <div>
            <span class="eyebrow">How to apply</span>
            <h2>3 easy steps</h2>
            <ol class="steps">
                <li><strong>Fill the form</strong> Send us the student and parent details.</li>
                <li><strong>Meet us</strong> Our office calls you to set a short meeting and test.</li>
                <li><strong>Join the class</strong> Submit the documents and fee, and your child starts.</li>
            </ol>

            <div class="info-box">
                <h3>Documents needed</h3>
                <ul class="check-list">
                    <li><?= icon('check') ?> Birth certificate (B-Form)</li>
                    <li><?= icon('check') ?> Parent CNIC copy</li>
                    <li><?= icon('check') ?> 2 passport size photos</li>
                    <li><?= icon('check') ?> Last school result (if any)</li>
                </ul>
            </div>
        </div>

        <div class="form-card">
            <h2>Admission Form</h2>

            <?php show_flash(); ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-error">
                    <?php foreach ($errors as $error): ?>
                        <div><?= e($error) ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= url('admissions.php') ?>">
                <div class="form-row">
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

                <div class="form-row">
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

                <button type="submit" class="btn btn-primary btn-block">Submit Application</button>
            </form>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
