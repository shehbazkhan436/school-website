<?php
/**
 * news-view.php - One news item. Example link: news-view.php?id=1
 */
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

<section class="section">
    <div class="container article">
        <p class="article-lead"><?= e($item['summary']) ?></p>
        <p><?= nl2br(e($item['body'])) ?></p>
        <a href="<?= url('news.php') ?>" class="btn btn-primary">Back to all news</a>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
