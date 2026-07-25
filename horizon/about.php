<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = "About";
$activePage = "about";
include __DIR__ . '/includes/header.php';
?>

<header class="page-header">
    <div class="container">
        <span class="eyebrow">About Us</span>
        <h1>Built to prepare students for what's next</h1>
        <p class="section-lede" style="margin:16px auto 0;">Horizon Secondary has grown into one of Zaria's most driven school communities.</p>
    </div>
</header>

<section class="section section-alt">
    <div class="container two-col">
        <div>
            <span class="section-eyebrow">Our Story</span>
            <h2 class="section-title">From One School to a Family of Two</h2>
            <p>Horizon Secondary School opened as the next chapter for the Martins Schools group — a place for students to keep building on the foundation laid at Crestview Primary, and to go further.</p>
            <p>What makes Horizon different is simple: we hold students to a high standard, and then we give them everything they need to meet it — strong teachers, real facilities, and a culture that expects effort.</p>
        </div>
        <img class="blob-img" src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&q=80" alt="Secondary school students studying">
    </div>
</section>

<section class="section">
    <div class="container">
        <span class="section-eyebrow">What We Believe</span>
        <h2 class="section-title">The Principles Behind Every Classroom</h2>
        <div class="card-grid">
            <div class="card">
                <div class="icon bg-amber">🎯</div>
                <h3>High Expectations</h3>
                <p>We believe students rise to the standard set for them — so we set it high.</p>
            </div>
            <div class="card alt-border">
                <div class="icon bg-teal">🧑‍🏫</div>
                <h3>Real Mentorship</h3>
                <p>Teachers who invest in each student's growth, not just their grades.</p>
            </div>
            <div class="card">
                <div class="icon bg-amber">🌍</div>
                <h3>Ready for the World</h3>
                <p>An education built for life after Horizon, not just for exams.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <span class="section-eyebrow">Our Leadership</span>
        <h2 class="section-title">Part of the Martins Schools Group</h2>
        <div class="dept-card" style="max-width:560px;">
            <h3 style="margin-bottom:8px;">A Two-School Family</h3>
            <p>Horizon Secondary shares its founding vision with Crestview Primary School — one educational journey, from a child's first day of school through graduation.</p>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
