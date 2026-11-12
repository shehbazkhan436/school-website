<?php
/**
 * gallery.php - Photo gallery
 * To add a photo: put the image in public/assets/img/ and add a line to $photos.
 */
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

<section class="section">
    <div class="container card-grid card-grid-3">
        <?php foreach ($photos as $photo): ?>
            <figure class="gallery-item">
                <img src="<?= url('assets/img/' . $photo['file']) ?>" alt="<?= e($photo['title']) ?>">
                <figcaption><?= e($photo['title']) ?></figcaption>
            </figure>
        <?php endforeach; ?>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
