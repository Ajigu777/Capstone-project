<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = "Contact";
$activePage = "contact";

$submitted = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // VULN #12/#13 (consistent with the rest of the project): no
    // server-side validation, no CSRF token.
    $submitted = true;
}

include __DIR__ . '/includes/header.php';
?>

<header class="page-header">
    <div class="container">
        <span class="eyebrow">Contact</span>
        <h1>We'd love to hear from you</h1>
        <p class="section-lede" style="margin:16px auto 0;">Questions about admissions, departments, or anything else — reach out any way that's easiest.</p>
    </div>
</header>

<section class="section section-alt">
    <div class="container two-col">
        <div>
            <span class="section-eyebrow">Reach Us</span>
            <h2 class="section-title">Get In Touch</h2>
            <div class="card-grid" style="grid-template-columns:1fr;">
                <div class="card">
                    <div class="icon bg-amber">📍</div>
                    <h3>Visit</h3>
                    <p>45 Horizon Avenue, Zaria, Kaduna State</p>
                </div>
                <div class="card alt-border">
                    <div class="icon bg-teal">📞</div>
                    <h3>Call</h3>
                    <p>0800 000 0002</p>
                </div>
                <div class="card">
                    <div class="icon bg-amber">✉️</div>
                    <h3>Email</h3>
                    <p>info@horizon.example</p>
                </div>
            </div>
        </div>
        <div>
            <?php if ($submitted): ?>
                <div class="card" style="background:#DFF3F1;">
                    <h3 style="margin-bottom:4px;">Message sent.</h3>
                    <p style="margin:0;">Thanks for reaching out — we'll reply soon.</p>
                </div>
            <?php else: ?>
                <!-- VULN #13: no CSRF token field -->
                <form method="POST" class="form-box">
                    <label>Your Name</label>
                    <input type="text" name="name">

                    <label>Email</label>
                    <input type="text" name="email">

                    <label>Message</label>
                    <textarea name="message" rows="5"></textarea>

                    <button type="submit" class="btn btn-primary" style="width:100%; justify-content:center;">Send Message</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
