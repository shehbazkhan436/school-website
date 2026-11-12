<?php
/**
 * news.php - All news and events (reads the "news" table)
 */
require_once __DIR__ . '/../app/bootstrap.php';

$pageTitle = 'News & Events';
$pageIntro = 'What is happening at our school.';
$allNews = News::latest();

require __DIR__ . '/../app/views/header.php';
require __DIR__ . '/../app/views/page-hero.php';
?>

<section class="section">
    <div class="container">
        <?php if (empty($allNews)): ?>
            <p class="empty">No news yet. Please check back soon.</p>
        <?php endif; ?>

        <div class="card-grid card-grid-3">
            <?php foreach ($allNews as $item): ?>
                <?php require __DIR__ . '/../app/views/news-card.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
