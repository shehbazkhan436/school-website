<?php
/**
 * about.php - About Us page
 */
require_once __DIR__ . '/../app/bootstrap.php';

$pageTitle = 'About Us';
$pageIntro = 'Our story, our mission and the values we teach every day.';

require __DIR__ . '/../app/views/header.php';
require __DIR__ . '/../app/views/page-hero.php';
?>

<section class="section">
    <div class="container split">
        <div>
            <span class="eyebrow">Our story</span>
            <h2>From 40 students to 1,200</h2>
            <p><?= e(SCHOOL_NAME) ?> opened in 2001 in a small rented house with just 40 students and 5 teachers. Parents trusted us because we treated every child like our own.</p>
            <p>Today we have a purpose-built campus with 45 classrooms, science and computer labs, a library, a sports ground and an auditorium. But our idea is still the same: happy children learn best.</p>
        </div>
        <div>
            <img src="<?= url('assets/img/hero-school.svg') ?>" alt="Our school building" class="rounded-image image-panel">
        </div>
    </div>
</section>

<section class="section section-light">
    <div class="container card-grid card-grid-3">
        <div class="feature">
            <div class="feature-icon"><?= icon('cap') ?></div>
            <h3>Our Mission</h3>
            <p>To give every child a strong education, good manners and the confidence to follow their dreams.</p>
        </div>
        <div class="feature">
            <div class="feature-icon"><?= icon('trophy') ?></div>
            <h3>Our Vision</h3>
            <p>To be the most trusted school in the city, known for kind teachers and bright students.</p>
        </div>
        <div class="feature">
            <div class="feature-icon"><?= icon('shield') ?></div>
            <h3>Our Values</h3>
            <p>Respect, honesty, hard work and kindness. In the classroom, on the ground and at home.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="principal-card">
            <div class="avatar avatar-large">AM</div>
            <div>
                <strong>Ayesha Malik</strong>
                <span>Principal, M.Phil Education</span>
            </div>
        </div>
        <div>
            <span class="eyebrow">Message from the Principal</span>
            <h2>"Every child has a gift"</h2>
            <p>Our job is to help each child find their gift and grow it. We do this by listening to our students, working closely with parents and never giving up on any child.</p>
            <p>I welcome you to visit our campus and see our school for yourself.</p>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
