<?php
/**
 * academics.php - Academics page
 */
require_once __DIR__ . '/../app/bootstrap.php';

$pageTitle = 'Academics';
$pageIntro = 'Our programs from Playgroup to Grade 10.';

// The school's programs. To add a new program, add one more item here.
$programs = [
    [
        'name'    => 'Early Years',
        'classes' => 'Playgroup, Nursery, Prep',
        'age'     => 'Age 3 - 5',
        'icon'    => 'palette',
        'text'    => 'Learning through play, stories, colours and songs. Children build early reading, numbers and social skills.',
        'points'  => ['Play-based learning', 'Phonics and early reading', 'Art, music and outdoor play'],
    ],
    [
        'name'    => 'Primary School',
        'classes' => 'Grade 1 - 5',
        'age'     => 'Age 6 - 10',
        'icon'    => 'book',
        'text'    => 'Strong basics in English, Urdu, Maths and Science, with regular reading and project work.',
        'points'  => ['English, Urdu, Maths, Science', 'Computer classes from Grade 1', 'Weekly library period'],
    ],
    [
        'name'    => 'Middle School',
        'classes' => 'Grade 6 - 8',
        'age'     => 'Age 11 - 13',
        'icon'    => 'flask',
        'text'    => 'Deeper learning with science labs, computer programming and clubs that build leadership.',
        'points'  => ['Science lab practicals', 'Debate and science clubs', 'Basic programming'],
    ],
    [
        'name'    => 'Secondary School',
        'classes' => 'Grade 9 - 10',
        'age'     => 'Age 14 - 16',
        'icon'    => 'cap',
        'text'    => 'Matric (Science and Computer groups) with extra classes and mock exams to prepare for the board.',
        'points'  => ['Science and Computer groups', 'Board exam preparation', 'Career counselling'],
    ],
];

require __DIR__ . '/../app/views/header.php';
require __DIR__ . '/../app/views/page-hero.php';
?>

<section class="section">
    <div class="container card-grid card-grid-2">
        <?php foreach ($programs as $program): ?>
            <div class="program">
                <div class="program-head">
                    <div class="feature-icon"><?= icon($program['icon']) ?></div>
                    <div>
                        <h3><?= e($program['name']) ?></h3>
                        <span><?= e($program['classes']) ?> &middot; <?= e($program['age']) ?></span>
                    </div>
                </div>
                <p><?= e($program['text']) ?></p>
                <ul class="check-list">
                    <?php foreach ($program['points'] as $point): ?>
                        <li><?= icon('check') ?> <?= e($point) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="section section-light">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Facilities</span>
            <h2>Our campus</h2>
        </div>
        <div class="card-grid card-grid-4">
            <div class="feature feature-small"><div class="feature-icon"><?= icon('book') ?></div><h3>Library</h3></div>
            <div class="feature feature-small"><div class="feature-icon"><?= icon('flask') ?></div><h3>Science Labs</h3></div>
            <div class="feature feature-small"><div class="feature-icon"><?= icon('monitor') ?></div><h3>Computer Lab</h3></div>
            <div class="feature feature-small"><div class="feature-icon"><?= icon('trophy') ?></div><h3>Sports Ground</h3></div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
