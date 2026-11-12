<?php
/**
 * index.php - Home page
 */
// BOOTSTRAP: load app/bootstrap.php first. It starts the session and loads
// config.php (settings), helpers.php (e(), url(), redirect()...) and all classes
// (Database, Auth, News...). Without this line nothing below would work.
require_once __DIR__ . '/../app/bootstrap.php';

$pageTitle = 'Home';
$latestNews = News::latest(3);

require __DIR__ . '/../app/views/header.php';
?>

<!-- 1. Hero banner -->
<section class="hero"> <!-- .hero = big blue banner on the home page (style.css part 5) -->
    <div class="container hero-grid"> <!-- .container = centres the content, max 1180px wide (style.css part 2); .hero-grid = text on the left, picture on the right (style.css part 5) -->
        <div class="hero-text"> <!-- .hero-text = left side of the banner (style.css part 5) -->
            <span class="badge">Admissions open for 2027</span> <!-- .badge = gold pill label in the hero (style.css part 3) -->
            <h1>A school where every child <span class="text-gold">shines</span></h1> <!-- .text-gold = gold coloured text (style.css part 1) -->
            <p>Strong academics, caring teachers and a safe campus. Playgroup to Grade 10, right here in Lahore.</p>
            <div class="hero-buttons"> <!-- .hero-buttons = puts the banner buttons in a row (style.css part 5) -->
                <a href="<?= url('admissions.php') ?>" class="btn btn-gold">Apply for Admission <?= icon('arrow') ?></a> <!-- .btn = basic round button (style.css part 3); .btn-gold = gold button (style.css part 3) -->
                <a href="<?= url('about.php') ?>" class="btn btn-outline-light">Discover Our School</a> <!-- .btn = basic round button (style.css part 3); .btn-outline-light = see-through button with white border, for dark backgrounds (style.css part 3) -->
            </div>
        </div>
        <div class="hero-image"> <!-- .hero-image = right side of the banner (style.css part 5) -->
            <img src="<?= url('assets/img/hero-school.svg') ?>" alt="Illustration of the school building">
        </div>
    </div>
</section>

<!-- 2. Numbers strip -->
<section class="stats"> <!-- .stats = white numbers box that overlaps the banner (style.css part 5) -->
    <div class="container stats-grid"> <!-- .container = centres the content, max 1180px wide (style.css part 2); .stats-grid = 4 number boxes in a row (style.css part 5) -->
        <div class="stat"><strong>25+</strong><span>Years of excellence</span></div> <!-- .stat = one number box (style.css part 5) -->
        <div class="stat"><strong>1,200</strong><span>Happy students</span></div> <!-- .stat = one number box (style.css part 5) -->
        <div class="stat"><strong>80</strong><span>Qualified teachers</span></div> <!-- .stat = one number box (style.css part 5) -->
        <div class="stat"><strong>98%</strong><span>Board exam pass rate</span></div> <!-- .stat = one number box (style.css part 5) -->
    </div>
</section>

<!-- 3. Why choose us -->
<section class="section"> <!-- .section = a page block with 80px space top and bottom (style.css part 2) -->
    <div class="container"> <!-- .container = centres the content, max 1180px wide (style.css part 2) -->
        <div class="section-head"> <!-- .section-head = centred title area above a section (style.css part 2) -->
            <span class="eyebrow">Why choose us</span> <!-- .eyebrow = small gold UPPERCASE text above a heading (style.css part 2) -->
            <h2>Everything your child needs to grow</h2>
        </div>

        <div class="card-grid card-grid-3"> <!-- .card-grid = CSS grid with 24px gap between cards (style.css part 2); .card-grid-3 = 3 columns (style.css part 2) -->
            <div class="feature"> <!-- .feature = white card with border (style.css part 6) -->
                <div class="feature-icon"><?= icon('book') ?></div> <!-- .feature-icon = light blue square behind an icon (style.css part 6) -->
                <h3>Strong Academics</h3>
                <p>Modern curriculum with focus on concepts, reading and problem solving.</p>
            </div>
            <div class="feature"> <!-- .feature = white card with border (style.css part 6) -->
                <div class="feature-icon"><?= icon('users') ?></div> <!-- .feature-icon = light blue square behind an icon (style.css part 6) -->
                <h3>Caring Teachers</h3>
                <p>Small classes so every teacher knows every child by name.</p>
            </div>
            <div class="feature"> <!-- .feature = white card with border (style.css part 6) -->
                <div class="feature-icon"><?= icon('flask') ?></div> <!-- .feature-icon = light blue square behind an icon (style.css part 6) -->
                <h3>Science &amp; Computer Labs</h3>
                <p>Hands-on learning in fully equipped science and computer labs.</p>
            </div>
            <div class="feature"> <!-- .feature = white card with border (style.css part 6) -->
                <div class="feature-icon"><?= icon('trophy') ?></div> <!-- .feature-icon = light blue square behind an icon (style.css part 6) -->
                <h3>Sports &amp; Activities</h3>
                <p>Cricket, football, art, debate and annual functions for all classes.</p>
            </div>
            <div class="feature"> <!-- .feature = white card with border (style.css part 6) -->
                <div class="feature-icon"><?= icon('shield') ?></div> <!-- .feature-icon = light blue square behind an icon (style.css part 6) -->
                <h3>Safe Campus</h3>
                <p>CCTV, trained guards and a nurse on campus all day.</p>
            </div>
            <div class="feature"> <!-- .feature = white card with border (style.css part 6) -->
                <div class="feature-icon"><?= icon('bus') ?></div> <!-- .feature-icon = light blue square behind an icon (style.css part 6) -->
                <h3>School Transport</h3>
                <p>Safe pick and drop service across all major areas of the city.</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. About preview -->
<section class="section section-light"> <!-- .section = a page block with 80px space top and bottom (style.css part 2); .section-light = light grey background for the section (style.css part 2) -->
    <div class="container split"> <!-- .container = centres the content, max 1180px wide (style.css part 2); .split = 2 equal columns side by side (style.css part 2) -->
        <div>
            <img src="<?= url('assets/img/gallery-classroom.svg') ?>" alt="Students in a classroom" class="rounded-image"> <!-- .rounded-image = image with round corners and shadow (style.css part 2) -->
        </div>
        <div>
            <span class="eyebrow">About our school</span> <!-- .eyebrow = small gold UPPERCASE text above a heading (style.css part 2) -->
            <h2>Learning with care since 2001</h2>
            <p><?= e(SCHOOL_NAME) ?> started with 40 students and a simple idea: every child can learn when they feel safe, happy and valued. Today we teach over 1,200 students from Playgroup to Grade 10.</p>
            <ul class="check-list"> <!-- .check-list = list with green tick icons (style.css part 3) -->
                <li><?= icon('check') ?> Matric and Cambridge streams</li>
                <li><?= icon('check') ?> Monthly parent-teacher updates</li>
                <li><?= icon('check') ?> Library with 8,000+ books</li>
            </ul>
            <a href="<?= url('about.php') ?>" class="btn btn-primary">Read Our Story</a> <!-- .btn = basic round button (style.css part 3); .btn-primary = navy button (style.css part 3) -->
        </div>
    </div>
</section>

<!-- 5. Latest news from the database -->
<section class="section"> <!-- .section = a page block with 80px space top and bottom (style.css part 2) -->
    <div class="container"> <!-- .container = centres the content, max 1180px wide (style.css part 2) -->
        <div class="section-head section-head-row"> <!-- .section-head = centred title area above a section (style.css part 2); .section-head-row = title on the left, link on the right (style.css part 2) -->
            <div>
                <span class="eyebrow">Stay updated</span> <!-- .eyebrow = small gold UPPERCASE text above a heading (style.css part 2) -->
                <h2>Latest News &amp; Events</h2>
            </div>
            <a href="<?= url('news.php') ?>" class="link-arrow">View all news <?= icon('arrow') ?></a> <!-- .link-arrow = bold link with an arrow icon (style.css part 3) -->
        </div>

        <div class="card-grid card-grid-3"> <!-- .card-grid = CSS grid with 24px gap between cards (style.css part 2); .card-grid-3 = 3 columns (style.css part 2) -->
            <?php foreach ($latestNews as $item): ?>
                <?php require __DIR__ . '/../app/views/news-card.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 6. Parent quotes -->
<section class="section section-light"> <!-- .section = a page block with 80px space top and bottom (style.css part 2); .section-light = light grey background for the section (style.css part 2) -->
    <div class="container"> <!-- .container = centres the content, max 1180px wide (style.css part 2) -->
        <div class="section-head"> <!-- .section-head = centred title area above a section (style.css part 2) -->
            <span class="eyebrow">Parents say</span> <!-- .eyebrow = small gold UPPERCASE text above a heading (style.css part 2) -->
            <h2>Trusted by families</h2>
        </div>

        <div class="card-grid card-grid-3"> <!-- .card-grid = CSS grid with 24px gap between cards (style.css part 2); .card-grid-3 = 3 columns (style.css part 2) -->
            <blockquote class="quote"> <!-- .quote = parent quote card with gold left border (style.css part 5) -->
                <p>"My daughter's confidence has grown so much. The teachers really care."</p>
                <cite>Mrs. Khan, parent of Grade 4</cite>
            </blockquote>
            <blockquote class="quote"> <!-- .quote = parent quote card with gold left border (style.css part 5) -->
                <p>"Great balance of studies and sports. My son loves going to school."</p>
                <cite>Mr. Ahmed, parent of Grade 7</cite>
            </blockquote>
            <blockquote class="quote"> <!-- .quote = parent quote card with gold left border (style.css part 5) -->
                <p>"Regular updates and easy to talk to. We feel part of the school."</p>
                <cite>Mrs. Raza, parent of Prep</cite>
            </blockquote>
        </div>
    </div>
</section>

<!-- 7. Call to action -->
<section class="cta"> <!-- .cta = gold "Apply now" strip (style.css part 5) -->
    <div class="container cta-inner"> <!-- .container = centres the content, max 1180px wide (style.css part 2); .cta-inner = text on the left, button on the right (style.css part 5) -->
        <div>
            <h2>Ready to join <?= e(SCHOOL_NAME) ?>?</h2>
            <p>Apply online in 2 minutes. Our office will call you within 2 working days.</p>
        </div>
        <a href="<?= url('admissions.php') ?>" class="btn btn-gold">Apply Now <?= icon('arrow') ?></a> <!-- .btn = basic round button (style.css part 3); .btn-gold = gold button (style.css part 3) -->
    </div>
</section>

<?php require __DIR__ . '/../app/views/footer.php'; ?>
