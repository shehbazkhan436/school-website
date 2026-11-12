<?php
/**
 * news-card.php
 * One news card. The page sets $item (one row from the news table) first.
 */
?>
<article class="news-card">
    <div class="news-card-top news-<?= e(strtolower($item['category'])) ?>">
        <span class="news-day"><?= date('d', strtotime($item['event_date'])) ?></span>
        <span class="news-month"><?= date('M Y', strtotime($item['event_date'])) ?></span>
    </div>
    <div class="news-card-body">
        <span class="tag"><?= e($item['category']) ?></span>
        <h3><a href="<?= url('news-view.php?id=' . $item['id']) ?>"><?= e($item['title']) ?></a></h3>
        <p><?= e($item['summary']) ?></p>
        <a href="<?= url('news-view.php?id=' . $item['id']) ?>" class="link-arrow">Read more <?= icon('arrow') ?></a>
    </div>
</article>
