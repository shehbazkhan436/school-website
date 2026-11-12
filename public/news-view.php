<?php
/**
 * news-view.php - One news item. Example link: news-view.php?id=1
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
require_once __DIR__ . '/../app/bootstrap.php';

$id = (int) ($_GET['id'] ?? 0);
$item = News::find($id);

// Wrong id? Go back to the news list.
if (!$item) {
    redirect('news.php');
}

$pageTitle = $item['title'];
$pageIntro = $item['category'] . ' - ' . nice_date($item['event_date']);

require __DIR__ . '/../app/views/header.php';
require __DIR__ . '/../app/views/page-hero.php';
?>

<section class="section"> <!-- .section = a page block with 80px space top and bottom (style.css part 2) -->
    <div class="container article"> <!-- .container = centres the content, max 1180px wide (style.css part 2); .article = news text, max 760px wide (style.css part 6) -->
        <p class="article-lead"><?= e($item['summary']) ?></p> <!-- .article-lead = bigger first line of the news (style.css part 6) -->
        <p><?= nl2br(e($item['body'])) ?></p>
        <a href="<?= url('news.php') ?>" class="btn btn-primary">Back to all news</a> <!-- .btn = basic round button (style.css part 3); .btn-primary = navy button (style.css part 3) -->
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
