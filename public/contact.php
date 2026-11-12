<?php
/**
 * contact.php - Contact page
 * Saves the form into the "messages" table.
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
require_once __DIR__ . '/../app/bootstrap.php';

$errors = [];
$form = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($form as $field => $value) {
        $form[$field] = post($field);
    }

    $errors = ContactMessage::validate($form);

    if (empty($errors)) {
        ContactMessage::create($form);
        set_flash('success', 'Thank you! Your message has been sent. We will reply soon.');
        redirect('contact.php');
    }
}

$pageTitle = 'Contact Us';
$pageIntro = 'Questions about admissions, fees or anything else? We are happy to help.';

require __DIR__ . '/../app/views/header.php';
require __DIR__ . '/../app/views/page-hero.php';
?>

<section class="section"> <!-- .section = a page block with 80px space top and bottom (style.css part 2) -->
    <div class="container split split-form"> <!-- .container = centres the content, max 1180px wide (style.css part 2); .split = 2 equal columns side by side (style.css part 2); .split-form = 2 columns, both start at the top (style.css part 2) -->
        <div>
            <span class="eyebrow">Get in touch</span> <!-- .eyebrow = small gold UPPERCASE text above a heading (style.css part 2) -->
            <h2>Visit or call us</h2>

            <div class="contact-list"> <!-- .contact-list = list of contact items with gap (style.css part 6) -->
                <div class="contact-item"> <!-- .contact-item = icon + text in a row (style.css part 6) -->
                    <div class="feature-icon"><?= icon('map') ?></div> <!-- .feature-icon = light blue square behind an icon (style.css part 6) -->
                    <div><strong>Address</strong><span><?= e(SCHOOL_ADDRESS) ?></span></div>
                </div>
                <div class="contact-item"> <!-- .contact-item = icon + text in a row (style.css part 6) -->
                    <div class="feature-icon"><?= icon('phone') ?></div> <!-- .feature-icon = light blue square behind an icon (style.css part 6) -->
                    <div><strong>Phone</strong><span><?= e(SCHOOL_PHONE) ?></span></div>
                </div>
                <div class="contact-item"> <!-- .contact-item = icon + text in a row (style.css part 6) -->
                    <div class="feature-icon"><?= icon('mail') ?></div> <!-- .feature-icon = light blue square behind an icon (style.css part 6) -->
                    <div><strong>Email</strong><span><?= e(SCHOOL_EMAIL) ?></span></div>
                </div>
                <div class="contact-item"> <!-- .contact-item = icon + text in a row (style.css part 6) -->
                    <div class="feature-icon"><?= icon('clock') ?></div> <!-- .feature-icon = light blue square behind an icon (style.css part 6) -->
                    <div><strong>Office hours</strong><span>Mon - Fri, 8:00 AM - 2:00 PM</span></div>
                </div>
            </div>
        </div>

        <div class="form-card"> <!-- .form-card = white form box with shadow (style.css part 7) -->
            <h2>Send a Message</h2>

            <?php show_flash(); ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-error"> <!-- .alert = message box (style.css part 3); .alert-error = red message box for errors (style.css part 3) -->
                    <?php foreach ($errors as $error): ?>
                        <div><?= e($error) ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= url('contact.php') ?>">
                <div class="form-row"> <!-- .form-row = 2 inputs side by side (style.css part 7) -->
                    <label>Your name *
                        <input type="text" name="name" value="<?= e($form['name']) ?>" required>
                    </label>
                    <label>Email *
                        <input type="email" name="email" value="<?= e($form['email']) ?>" required>
                    </label>
                </div>

                <label>Subject *
                    <input type="text" name="subject" value="<?= e($form['subject']) ?>" required>
                </label>

                <label>Message *
                    <textarea name="message" rows="5" required><?= e($form['message']) ?></textarea>
                </label>

                <button type="submit" class="btn btn-primary btn-block">Send Message</button> <!-- .btn = basic round button (style.css part 3); .btn-primary = navy button (style.css part 3); .btn-block = full width button (style.css part 3) -->
            </form>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
