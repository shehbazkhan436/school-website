<?php
/**
 * contact.php - Contact page
 * Saves the form into the "messages" table.
 */
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

<section class="section">
    <div class="container split split-form">
        <div>
            <span class="eyebrow">Get in touch</span>
            <h2>Visit or call us</h2>

            <div class="contact-list">
                <div class="contact-item">
                    <div class="feature-icon"><?= icon('map') ?></div>
                    <div><strong>Address</strong><span><?= e(SCHOOL_ADDRESS) ?></span></div>
                </div>
                <div class="contact-item">
                    <div class="feature-icon"><?= icon('phone') ?></div>
                    <div><strong>Phone</strong><span><?= e(SCHOOL_PHONE) ?></span></div>
                </div>
                <div class="contact-item">
                    <div class="feature-icon"><?= icon('mail') ?></div>
                    <div><strong>Email</strong><span><?= e(SCHOOL_EMAIL) ?></span></div>
                </div>
                <div class="contact-item">
                    <div class="feature-icon"><?= icon('clock') ?></div>
                    <div><strong>Office hours</strong><span>Mon - Fri, 8:00 AM - 2:00 PM</span></div>
                </div>
            </div>
        </div>

        <div class="form-card">
            <h2>Send a Message</h2>

            <?php show_flash(); ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-error">
                    <?php foreach ($errors as $error): ?>
                        <div><?= e($error) ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= url('contact.php') ?>">
                <div class="form-row">
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

                <button type="submit" class="btn btn-primary btn-block">Send Message</button>
            </form>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
