<?php
/**
 * teachers.php - Our Teachers page (reads the "teachers" table)
 */
require_once __DIR__ . '/../app/bootstrap.php';

$pageTitle = 'Our Teachers';
$pageIntro = 'Qualified, caring and experienced. Meet the people who teach your child.';
$teachers = Teacher::all();

require __DIR__ . '/../app/views/header.php';
require __DIR__ . '/../app/views/page-hero.php';
?>

<section class="section">
    <div class="container card-grid card-grid-4">
        <?php foreach ($teachers as $teacher): ?>
            <div class="teacher">
                <div class="avatar"><?= e(Teacher::initials($teacher['name'])) ?></div>
                <h3><?= e($teacher['name']) ?></h3>
                <span class="tag"><?= e($teacher['subject']) ?></span>
                <p><?= e($teacher['qualification']) ?></p>
                <small><?= e($teacher['experience_years']) ?> years experience</small>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
