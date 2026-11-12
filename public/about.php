<?php
/**
 * about.php - About Us page
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
require_once __DIR__ . '/../app/bootstrap.php';

$pageTitle = 'About Us';
$pageIntro = 'Our story, our mission and the values we teach every day.';

require __DIR__ . '/../app/views/header.php';
require __DIR__ . '/../app/views/page-hero.php';
?>

<section class="section"> <!-- .section = a page block with 80px space top and bottom (style.css part 2) -->
    <div class="container split"> <!-- .container = centres the content, max 1180px wide (style.css part 2); .split = 2 equal columns side by side (style.css part 2) -->
        <div>
            <span class="eyebrow">Our story</span> <!-- .eyebrow = small gold UPPERCASE text above a heading (style.css part 2) -->
            <h2>From 40 students to 1,200</h2>
            <p><?= e(SCHOOL_NAME) ?> opened in 2001 in a small rented house with just 40 students and 5 teachers. Parents trusted us because we treated every child like our own.</p>
            <p>Today we have a purpose-built campus with 45 classrooms, science and computer labs, a library, a sports ground and an auditorium. But our idea is still the same: happy children learn best.</p>
        </div>
        <div>
            <img src="<?= url('assets/img/hero-school.svg') ?>" alt="Our school building" class="rounded-image image-panel"> <!-- .rounded-image = image with round corners and shadow (style.css part 2); .image-panel = blue gradient box behind the image (style.css part 2) -->
        </div>
    </div>
</section>

<section class="section section-light"> <!-- .section = a page block with 80px space top and bottom (style.css part 2); .section-light = light grey background for the section (style.css part 2) -->
    <div class="container card-grid card-grid-3"> <!-- .container = centres the content, max 1180px wide (style.css part 2); .card-grid = CSS grid with 24px gap between cards (style.css part 2); .card-grid-3 = 3 columns (style.css part 2) -->
        <div class="feature"> <!-- .feature = white card with border (style.css part 6) -->
            <div class="feature-icon"><?= icon('cap') ?></div> <!-- .feature-icon = light blue square behind an icon (style.css part 6) -->
            <h3>Our Mission</h3>
            <p>To give every child a strong education, good manners and the confidence to follow their dreams.</p>
        </div>
        <div class="feature"> <!-- .feature = white card with border (style.css part 6) -->
            <div class="feature-icon"><?= icon('trophy') ?></div> <!-- .feature-icon = light blue square behind an icon (style.css part 6) -->
            <h3>Our Vision</h3>
            <p>To be the most trusted school in the city, known for kind teachers and bright students.</p>
        </div>
        <div class="feature"> <!-- .feature = white card with border (style.css part 6) -->
            <div class="feature-icon"><?= icon('shield') ?></div> <!-- .feature-icon = light blue square behind an icon (style.css part 6) -->
            <h3>Our Values</h3>
            <p>Respect, honesty, hard work and kindness. In the classroom, on the ground and at home.</p>
        </div>
    </div>
</section>

<section class="section"> <!-- .section = a page block with 80px space top and bottom (style.css part 2) -->
    <div class="container split"> <!-- .container = centres the content, max 1180px wide (style.css part 2); .split = 2 equal columns side by side (style.css part 2) -->
        <div class="principal-card"> <!-- .principal-card = grey box with the principal (style.css part 6) -->
            <div class="avatar avatar-large">AM</div> <!-- .avatar = round circle with initials (style.css part 6); .avatar-large = bigger circle (style.css part 6) -->
            <div>
                <strong>Ayesha Malik</strong>
                <span>Principal, M.Phil Education</span>
            </div>
        </div>
        <div>
            <span class="eyebrow">Message from the Principal</span> <!-- .eyebrow = small gold UPPERCASE text above a heading (style.css part 2) -->
            <h2>"Every child has a gift"</h2>
            <p>Our job is to help each child find their gift and grow it. We do this by listening to our students, working closely with parents and never giving up on any child.</p>
            <p>I welcome you to visit our campus and see our school for yourself.</p>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
