<?php
/**
 * teachers.php - Our Teachers page (reads the "teachers" table)
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
require_once __DIR__ . '/../app/bootstrap.php';

$pageTitle = 'Our Teachers';
$pageIntro = 'Qualified, caring and experienced. Meet the people who teach your child.';
$teachers = Teacher::all();

require __DIR__ . '/../app/views/header.php';
require __DIR__ . '/../app/views/page-hero.php';
?>

<section class="section"> <!-- .section = a page block with 80px space top and bottom (style.css part 2) -->
    <div class="container card-grid card-grid-4"> <!-- .container = centres the content, max 1180px wide (style.css part 2); .card-grid = CSS grid with 24px gap between cards (style.css part 2); .card-grid-4 = 4 columns (style.css part 2) -->
        <?php foreach ($teachers as $teacher): ?>
            <div class="teacher"> <!-- .teacher = teacher card, centred (style.css part 6) -->
                <div class="avatar"><?= e(Teacher::initials($teacher['name'])) ?></div> <!-- .avatar = round circle with initials (style.css part 6) -->
                <h3><?= e($teacher['name']) ?></h3>
                <span class="tag"><?= e($teacher['subject']) ?></span> <!-- .tag = small blue pill label (style.css part 3) -->
                <p><?= e($teacher['qualification']) ?></p>
                <small><?= e($teacher['experience_years']) ?> years experience</small>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
