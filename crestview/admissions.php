<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = "Admissions";
$activePage = "admissions";

$submitted = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // VULN #12 (consistent with portal): no server-side validation on any
    // field beyond what's typed - this feeds an inquiries table if one is
    // added later, so treat this the same as the portal's forms.
    // VULN #13: no CSRF token on this form either.
    $submitted = true;
}

include __DIR__ . '/includes/header.php';
?>

<header class="page-header">
    <div class="container">
        <span class="eyebrow">Admissions</span>
        <h1>Join the Crestview family</h1>
        <p class="section-lede" style="margin:16px auto 0;">We're currently welcoming applications for the 2026/2027 school year.</p>
    </div>
</header>

<section class="section section-alt">
    <div class="container">
        <h2 class="section-title">How Admissions Works</h2>
        <div class="card-grid">
            <div class="card">
                <div class="icon bg-sun">📝</div>
                <h3>1. Inquire</h3>
                <p>Send us your details using the form below, or call the school office directly.</p>
            </div>
            <div class="card">
                <div class="icon bg-sky">☕</div>
                <h3>2. Visit &amp; Chat</h3>
                <p>Tour the school and meet the team so you can see the classrooms for yourself.</p>
            </div>
            <div class="card">
                <div class="icon bg-grass">✅</div>
                <h3>3. Enroll</h3>
                <p>We'll walk you through paperwork and get your child settled in before day one.</p>
            </div>
        </div>
    </div>
</section>

<svg class="wave-divider" viewBox="0 0 1200 60" preserveAspectRatio="none">
    <path d="M0,30 C300,70 900,-10 1200,30 L1200,60 L0,60 Z" fill="#FFFFFF"/>
</svg>

<section class="section">
    <div class="container two-col">
        <div>
            <h2 class="section-title">Send an Inquiry</h2>
            <p style="color:var(--ink-soft); margin-bottom:24px;">Fill this in and our admissions team will reach out within two working days.</p>

            <?php if ($submitted): ?>
                <div class="card" style="background:#E4F7E7;">
                    <h3 style="margin-bottom:4px;">Thanks — we've got it! 🎉</h3>
                    <p style="margin:0;">Someone from our admissions team will be in touch soon.</p>
                </div>
            <?php else: ?>
                <!-- VULN #13: no CSRF token field -->
                <form method="POST" class="form-box">
                    <label>Parent / Guardian Name</label>
                    <input type="text" name="guardian_name">

                    <label>Child's Name</label>
                    <input type="text" name="child_name">

                    <label>Child's Age</label>
                    <input type="text" name="child_age">

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
        <img class="blob-img" src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=800&q=80" alt="Parent and child at school">
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
