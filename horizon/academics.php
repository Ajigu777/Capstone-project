<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = "Academics";
$activePage = "academics";
include __DIR__ . '/includes/header.php';
?>

<header class="page-header">
    <div class="container">
        <span class="eyebrow">Academics</span>
        <h1>A curriculum built for real outcomes</h1>
        <p class="section-lede" style="margin:16px auto 0;">JSS1 through SSS3, structured to build strong fundamentals and then real depth.</p>
    </div>
</header>

<section class="section section-alt">
    <div class="container">
        <span class="section-eyebrow">Core Program</span>
        <h2 class="section-title">Junior &amp; Senior Secondary</h2>
        <div class="card-grid">
            <div class="card">
                <div class="icon bg-amber">📘</div>
                <h3>Junior Secondary (JSS1–JSS3)</h3>
                <p>A broad, well-rounded foundation across sciences, arts, and languages before students choose a specialization.</p>
            </div>
            <div class="card alt-border">
                <div class="icon bg-teal">🎓</div>
                <h3>Senior Secondary (SSS1–SSS3)</h3>
                <p>Focused tracks in Sciences, Arts, or Commercial studies, building directly toward WAEC/NECO and beyond.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container two-col">
        <img class="blob-img" src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=800&q=80" alt="Students in a science lab">
        <div>
            <span class="section-eyebrow">How We Teach</span>
            <h2 class="section-title">Depth Over Memorization</h2>
            <p>Our teachers push past rote recall — labs, debates, and applied projects run alongside standard coursework so concepts actually stick, not just for the next test but for the years after.</p>
            <p>Regular assessments track more than test scores: we look at how each student is actually progressing, term over term, and adjust support before a struggling subject becomes a struggling year.</p>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
