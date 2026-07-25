<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = "Departments";
$activePage = "departments";
include __DIR__ . '/includes/header.php';
?>

<header class="page-header">
    <div class="container">
        <span class="eyebrow">Departments</span>
        <h1>Six departments, one shared standard</h1>
        <p class="section-lede" style="margin:16px auto 0;">Every department at Horizon is led by teachers who specialize in their subject, not generalists spread thin.</p>
    </div>
</header>

<section class="section section-alt">
    <div class="container">
        <div class="card-grid">
            <div class="dept-card">
                <h3>Sciences</h3>
                <p>Biology, Chemistry, and Physics with hands-on lab work every term.</p>
                <div class="subjects">
                    <span>Biology</span><span>Chemistry</span><span>Physics</span><span>Basic Science</span>
                </div>
            </div>
            <div class="dept-card">
                <h3>Mathematics</h3>
                <p>From foundational arithmetic through further mathematics for SSS science students.</p>
                <div class="subjects">
                    <span>General Mathematics</span><span>Further Mathematics</span>
                </div>
            </div>
            <div class="dept-card">
                <h3>Languages</h3>
                <p>Strong communication skills in English and a national language of the student's choosing.</p>
                <div class="subjects">
                    <span>English Language</span><span>Literature</span><span>Hausa</span>
                </div>
            </div>
            <div class="dept-card">
                <h3>Commercial Studies</h3>
                <p>Business fundamentals for students heading toward commerce, finance, or entrepreneurship.</p>
                <div class="subjects">
                    <span>Accounting</span><span>Economics</span><span>Commerce</span>
                </div>
            </div>
            <div class="dept-card">
                <h3>Humanities</h3>
                <p>Understanding people, history, and society — the foundation for the arts track.</p>
                <div class="subjects">
                    <span>Government</span><span>History</span><span>Geography</span><span>CRK/IRK</span>
                </div>
            </div>
            <div class="dept-card">
                <h3>Technology &amp; Vocational</h3>
                <p>Practical, in-demand skills alongside standard coursework.</p>
                <div class="subjects">
                    <span>Computer Studies</span><span>Basic Technology</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
