<?php
/**
 * news.php - All news and events (reads the "news" table)
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
require_once __DIR__ . '/../app/bootstrap.php';

$pageTitle = 'News & Events';
$pageIntro = 'What is happening at our school.';
$allNews = News::latest();

require __DIR__ . '/../app/views/header.php';
require __DIR__ . '/../app/views/page-hero.php';
?>

<section class="section"> <!-- .section = a page block with 80px space top and bottom (style.css part 2) -->
    <div class="container"> <!-- .container = centres the content, max 1180px wide (style.css part 2) -->
        <?php if (empty($allNews)): ?>
            <p class="empty">No news yet. Please check back soon.</p> <!-- .empty = grey centred "nothing here" text (style.css part 2) -->
        <?php endif; ?>

        <div class="card-grid card-grid-3"> <!-- .card-grid = CSS grid with 24px gap between cards (style.css part 2); .card-grid-3 = 3 columns (style.css part 2) -->
            <?php foreach ($allNews as $item): ?>
                <?php require __DIR__ . '/../app/views/news-card.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
