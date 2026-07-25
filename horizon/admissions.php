<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = "Admissions";
$activePage = "admissions";

$submitted = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // VULN #12/#13 (consistent with Crestview and the portal): no
    // server-side validation, no CSRF token, and this doesn't persist
    // to a database table yet.
    $submitted = true;
}

include __DIR__ . '/includes/header.php';
?>

<header class="page-header">
    <div class="container">
        <span class="eyebrow">Admissions</span>
        <h1>Join the Horizon community</h1>
        <p class="section-lede" style="margin:16px auto 0;">We're currently welcoming applications for the 2026/2027 school year, JSS1 and SSS1 entry.</p>
    </div>
</header>

<section class="section section-alt">
    <div class="container">
        <span class="section-eyebrow">Process</span>
        <h2 class="section-title">How Admissions Works</h2>
        <div class="card-grid">
            <div class="card">
                <div class="icon bg-amber">📝</div>
                <h3>1. Inquire</h3>
                <p>Send your details using the form below, or call the school office directly.</p>
            </div>
            <div class="card alt-border">
                <div class="icon bg-teal">📋</div>
                <h3>2. Entrance Assessment</h3>
                <p>Students sit a short placement assessment in English and Mathematics.</p>
            </div>
            <div class="card">
                <div class="icon bg-amber">✅</div>
                <h3>3. Enroll</h3>
                <p>We'll walk you through paperwork and orientation before the term starts.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container two-col">
        <div>
            <span class="section-eyebrow">Get Started</span>
            <h2 class="section-title">Send an Inquiry</h2>
            <p style="color:var(--ink-soft); margin-bottom:24px;">Fill this in and our admissions team will reach out within two working days.</p>

            <?php if ($submitted): ?>
                <div class="card" style="background:#DFF3F1;">
                    <h3 style="margin-bottom:4px;">Thanks — we've received it.</h3>
                    <p style="margin:0;">Someone from our admissions team will be in touch soon.</p>
                </div>
            <?php else: ?>
                <!-- VULN #13: no CSRF token field -->
                <form method="POST" class="form-box">
                    <label>Parent / Guardian Name</label>
                    <input type="text" name="guardian_name">

                    <label>Student's Name</label>
                    <input type="text" name="student_name">

                    <label>Entry Level</label>
                    <select name="entry_level">
                        <option>JSS1</option>
                        <option>SSS1</option>
                    </select>

                    <label>Phone Number</label>
                    <input type="text" name="phone">

                    <label>Email</label>
                    <input type="text" name="email">

                    <label>Message (optional)</label>
                    <textarea name="message" rows="4"></textarea>

                    <button type="submit" class="btn btn-primary" style="width:100%; justify-content:center;">Send Inquiry</button>
                </form>
            <?php endif; ?>
        </div>
        <img class="blob-img" src="https://images.unsplash.com/photo-1509062522246-3755977927d7?w=800&q=80" alt="Secondary school students">
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
