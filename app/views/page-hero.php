<?php
/**
 * page-hero.php
 * The coloured title band at the top of inner pages (About, Contact...).
 * Before including it, a page sets $pageTitle and $pageIntro.
 */
?>
<section class="page-hero"> <!-- .page-hero = blue title band on inner pages (style.css part 5) -->
    <div class="container"> <!-- .container = centres the content, max 1180px wide (style.css part 2) -->
        <h1><?= e($pageTitle) ?></h1>
        <p><?= e($pageIntro ?? '') ?></p>
    </div>
</section>
