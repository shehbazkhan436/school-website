<?php
/**
 * footer.php
 * Bottom of every public page.
 */
?>
</main>

<footer class="footer"> <!-- .footer = dark footer (style.css part 8) -->
    <div class="container footer-grid"> <!-- .container = centres the content, max 1180px wide (style.css part 2); .footer-grid = 4 footer columns (style.css part 8) -->
        <div>
            <a href="<?= url('index.php') ?>" class="logo logo-light"> <!-- .logo = logo image + school name in a row (style.css part 4); .logo-light = white school name, for dark backgrounds (style.css part 4) -->
                <img src="<?= url('assets/img/logo.svg') ?>" alt="" width="40" height="40">
                <span><strong><?= e(SCHOOL_NAME) ?></strong></span>
            </a>
            <p>A caring school where every child learns, grows and shines. Playgroup to Grade 10.</p>
        </div>

        <div>
            <h4>Quick Links</h4>
            <ul>
                <li><a href="<?= url('about.php') ?>">About Us</a></li>
                <li><a href="<?= url('academics.php') ?>">Academics</a></li>
                <li><a href="<?= url('admissions.php') ?>">Admissions</a></li>
                <li><a href="<?= url('news.php') ?>">News &amp; Events</a></li>
            </ul>
        </div>

        <div>
            <h4>Contact</h4>
            <ul class="footer-contact"> <!-- .footer-contact = footer list with icons (style.css part 8) -->
                <li><?= icon('map') ?> <?= e(SCHOOL_ADDRESS) ?></li>
                <li><?= icon('phone') ?> <?= e(SCHOOL_PHONE) ?></li>
                <li><?= icon('mail') ?> <?= e(SCHOOL_EMAIL) ?></li>
            </ul>
        </div>

        <div>
            <h4>School Timings</h4>
            <ul>
                <li>Monday - Thursday: 8:00 AM - 2:00 PM</li>
                <li>Friday: 8:00 AM - 12:30 PM</li>
                <li>Saturday &amp; Sunday: Closed</li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom"> <!-- .footer-bottom = copyright line (style.css part 8) -->
        <div class="container"> <!-- .container = centres the content, max 1180px wide (style.css part 2) -->
            &copy; <?= date('Y') ?> <?= e(SCHOOL_NAME) ?>. All rights reserved.
            <a href="<?= url('admin/login.php') ?>">Staff Login</a>
        </div>
    </div>
</footer>

</body>
</html>
