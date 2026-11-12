<?php
/**
 * gallery.php - Photo gallery
 * To add a photo: put the image in public/assets/img/ and add a line to $photos.
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
require_once __DIR__ . '/../app/bootstrap.php';

$pageTitle = 'Gallery';
$pageIntro = 'A look at life on our campus.';

$photos = [
    ['file' => 'gallery-classroom.svg', 'title' => 'Smart Classrooms'],
    ['file' => 'gallery-library.svg',   'title' => 'Library'],
    ['file' => 'gallery-lab.svg',       'title' => 'Science Lab'],
    ['file' => 'gallery-sports.svg',    'title' => 'Sports Day'],
    ['file' => 'gallery-art.svg',       'title' => 'Art Room'],
    ['file' => 'gallery-computer.svg',  'title' => 'Computer Lab'],
];

require __DIR__ . '/../app/views/header.php';
require __DIR__ . '/../app/views/page-hero.php';
?>

<section class="section"> <!-- .section = a page block with 80px space top and bottom (style.css part 2) -->
    <div class="container card-grid card-grid-3"> <!-- .container = centres the content, max 1180px wide (style.css part 2); .card-grid = CSS grid with 24px gap between cards (style.css part 2); .card-grid-3 = 3 columns (style.css part 2) -->
        <?php foreach ($photos as $photo): ?>
            <figure class="gallery-item"> <!-- .gallery-item = photo card, zooms on hover (style.css part 6) -->
                <img src="<?= url('assets/img/' . $photo['file']) ?>" alt="<?= e($photo['title']) ?>">
                <figcaption><?= e($photo['title']) ?></figcaption>
            </figure>
        <?php endforeach; ?>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
