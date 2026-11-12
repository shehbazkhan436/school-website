<?php
/**
 * news-card.php
 * One news card. The page sets $item (one row from the news table) first.
 */
?>
<article class="news-card"> <!-- .news-card = news card (style.css part 6) -->
    <div class="news-card-top news-<?= e(strtolower($item['category'])) ?>"> <!-- .news-card-top = coloured date area at the top of the card (style.css part 6); .news- = colour by category: news-event = green, news-admissions = gold (style.css part 6) -->
        <span class="news-day"><?= date('d', strtotime($item['event_date'])) ?></span> <!-- .news-day = big day number (style.css part 6) -->
        <span class="news-month"><?= date('M Y', strtotime($item['event_date'])) ?></span> <!-- .news-month = month and year under the day (style.css part 6) -->
    </div>
    <div class="news-card-body"> <!-- .news-card-body = text area of the card (style.css part 6) -->
        <span class="tag"><?= e($item['category']) ?></span> <!-- .tag = small blue pill label (style.css part 3) -->
        <h3><a href="<?= url('news-view.php?id=' . $item['id']) ?>"><?= e($item['title']) ?></a></h3>
        <p><?= e($item['summary']) ?></p>
        <a href="<?= url('news-view.php?id=' . $item['id']) ?>" class="link-arrow">Read more <?= icon('arrow') ?></a> <!-- .link-arrow = bold link with an arrow icon (style.css part 3) -->
    </div>
</article>
