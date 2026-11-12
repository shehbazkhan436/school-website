<?php
/**
 * page-hero.php
 * The coloured title band at the top of inner pages (About, Contact...).
 * Before including it, a page sets $pageTitle and $pageIntro.
 */
?>
<section class="page-hero">
    <div class="container">
        <h1><?= e($pageTitle) ?></h1>
        <p><?= e($pageIntro ?? '') ?></p>
    </div>
</section>
