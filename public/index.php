<?php
/**
 * index.php - Home page
 */
require_once __DIR__ . '/../app/bootstrap.php';

$pageTitle = 'Home';
$latestNews = News::latest(3);

require __DIR__ . '/../app/views/header.php';
?>

<!-- 1. Hero banner -->
<section class="hero">
    <div class="container hero-grid">
        <div class="hero-text">
            <span class="badge">Admissions open for 2027</span>
            <h1>A school where every child <span class="text-gold">shines</span></h1>
            <p>Strong academics, caring teachers and a safe campus. Playgroup to Grade 10, right here in Lahore.</p>
            <div class="hero-buttons">
                <a href="<?= url('admissions.php') ?>" class="btn btn-gold">Apply for Admission <?= icon('arrow') ?></a>
                <a href="<?= url('about.php') ?>" class="btn btn-outline-light">Discover Our School</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="<?= url('assets/img/hero-school.svg') ?>" alt="Illustration of the school building">
        </div>
    </div>
</section>

<!-- 2. Numbers strip -->
<section class="stats">
    <div class="container stats-grid">
        <div class="stat"><strong>25+</strong><span>Years of excellence</span></div>
        <div class="stat"><strong>1,200</strong><span>Happy students</span></div>
        <div class="stat"><strong>80</strong><span>Qualified teachers</span></div>
        <div class="stat"><strong>98%</strong><span>Board exam pass rate</span></div>
    </div>
</section>

<!-- 3. Why choose us -->
<section class="section">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Why choose us</span>
            <h2>Everything your child needs to grow</h2>
        </div>

        <div class="card-grid card-grid-3">
            <div class="feature">
                <div class="feature-icon"><?= icon('book') ?></div>
                <h3>Strong Academics</h3>
                <p>Modern curriculum with focus on concepts, reading and problem solving.</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><?= icon('users') ?></div>
                <h3>Caring Teachers</h3>
                <p>Small classes so every teacher knows every child by name.</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><?= icon('flask') ?></div>
                <h3>Science &amp; Computer Labs</h3>
                <p>Hands-on learning in fully equipped science and computer labs.</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><?= icon('trophy') ?></div>
                <h3>Sports &amp; Activities</h3>
                <p>Cricket, football, art, debate and annual functions for all classes.</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><?= icon('shield') ?></div>
                <h3>Safe Campus</h3>
                <p>CCTV, trained guards and a nurse on campus all day.</p>
            </div>
            <div class="feature">
                <div class="feature-icon"><?= icon('bus') ?></div>
                <h3>School Transport</h3>
                <p>Safe pick and drop service across all major areas of the city.</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. About preview -->
<section class="section section-light">
    <div class="container split">
        <div>
            <img src="<?= url('assets/img/gallery-classroom.svg') ?>" alt="Students in a classroom" class="rounded-image">
        </div>
        <div>
            <span class="eyebrow">About our school</span>
            <h2>Learning with care since 2001</h2>
            <p><?= e(SCHOOL_NAME) ?> started with 40 students and a simple idea: every child can learn when they feel safe, happy and valued. Today we teach over 1,200 students from Playgroup to Grade 10.</p>
            <ul class="check-list">
                <li><?= icon('check') ?> Matric and Cambridge streams</li>
                <li><?= icon('check') ?> Monthly parent-teacher updates</li>
                <li><?= icon('check') ?> Library with 8,000+ books</li>
            </ul>
            <a href="<?= url('about.php') ?>" class="btn btn-primary">Read Our Story</a>
        </div>
    </div>
</section>

<!-- 5. Latest news from the database -->
<section class="section">
    <div class="container">
        <div class="section-head section-head-row">
            <div>
                <span class="eyebrow">Stay updated</span>
                <h2>Latest News &amp; Events</h2>
            </div>
            <a href="<?= url('news.php') ?>" class="link-arrow">View all news <?= icon('arrow') ?></a>
        </div>

        <div class="card-grid card-grid-3">
            <?php foreach ($latestNews as $item): ?>
                <?php require __DIR__ . '/../app/views/news-card.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 6. Parent quotes -->
<section class="section section-light">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Parents say</span>
            <h2>Trusted by families</h2>
        </div>

        <div class="card-grid card-grid-3">
            <blockquote class="quote">
                <p>"My daughter's confidence has grown so much. The teachers really care."</p>
                <cite>Mrs. Khan, parent of Grade 4</cite>
            </blockquote>
            <blockquote class="quote">
                <p>"Great balance of studies and sports. My son loves going to school."</p>
                <cite>Mr. Ahmed, parent of Grade 7</cite>
            </blockquote>
            <blockquote class="quote">
                <p>"Regular updates and easy to talk to. We feel part of the school."</p>
                <cite>Mrs. Raza, parent of Prep</cite>
            </blockquote>
        </div>
    </div>
</section>

<!-- 7. Call to action -->
<section class="cta">
    <div class="container cta-inner">
        <div>
            <h2>Ready to join <?= e(SCHOOL_NAME) ?>?</h2>
            <p>Apply online in 2 minutes. Our office will call you within 2 working days.</p>
        </div>
        <a href="<?= url('admissions.php') ?>" class="btn btn-gold">Apply Now <?= icon('arrow') ?></a>
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
