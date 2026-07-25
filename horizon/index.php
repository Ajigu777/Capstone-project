<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = "Home";
$activePage = "home";

$stmt = $mysqli->prepare("SELECT * FROM news_events WHERE school_id = ? ORDER BY published_at DESC LIMIT 3");
$stmt->bind_param("i", $SCHOOL_ID);
$stmt->execute();
$newsResult = $stmt->get_result();

include __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="eyebrow">Applications open for 2026/2027</span>
            <h1>Preparing students for<br><span class="accent">what comes next.</span></h1>
            <p class="lede">
                Horizon Secondary School gives students in Zaria a rigorous,
                well-rounded education — the kind that builds real skills,
                real character, and real options after graduation.
            </p>
            <div class="btn-row">
                <a href="/horizon/admissions.php" class="btn btn-primary">Start Admissions &rarr;</a>
                <a href="/horizon/departments.php" class="btn btn-secondary">Explore Departments</a>
            </div>
        </div>
        <div class="hero-art" aria-hidden="true">
            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=600&h=500&auto=format&fit=crop" alt="Secondary school students" style="width:100%; border-radius:16px; box-shadow:0 20px 60px rgba(0,0,0,0.4); object-fit:cover; max-height:420px;">
        </div>
    </div>
</section>

<svg class="horizon-divider" viewBox="0 0 1200 64" preserveAspectRatio="none">
    <path d="M0,64 L1200,0 L1200,64 Z" fill="#F7F5F0"/>
</svg>

<section class="section">
    <div class="container">
        <span class="section-eyebrow">Why Horizon</span>
        <h2 class="section-title">A school that takes students seriously</h2>
        <p class="section-lede">Every subject, every teacher, every project is built around one question: is this preparing our students for real life after Horizon?</p>
        <div class="card-grid">
            <div class="card">
                <div class="icon bg-amber">📖</div>
                <h3>Rigorous Academics</h3>
                <p>A curriculum that challenges students to think critically, not just recall facts for an exam.</p>
            </div>
            <div class="card alt-border">
                <div class="icon bg-teal">🧭</div>
                <h3>Real Mentorship</h3>
                <p>Teachers who know each student's strengths and push them toward their next milestone.</p>
            </div>
            <div class="card">
                <div class="icon bg-amber">🏆</div>
                <h3>Beyond the Classroom</h3>
                <p>Clubs, sports, and competitions that build confidence and character alongside academics.</p>
            </div>
            <div class="card alt-border">
                <div class="icon bg-teal">🚀</div>
                <h3>College &amp; Career Ready</h3>
                <p>Guidance and preparation for whatever comes after graduation — university or otherwise.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:16px; margin-bottom:32px;">
            <div>
                <span class="section-eyebrow">Latest</span>
                <h2 class="section-title" style="margin-bottom:0;">News from Horizon</h2>
            </div>
            <a href="/horizon/news.php" class="btn btn-secondary-light">See all news &rarr;</a>
        </div>

        <?php if ($newsResult && $newsResult->num_rows > 0): ?>
            <div class="card-grid">
                <?php while ($item = $newsResult->fetch_assoc()): ?>
                    <div class="news-card">
                        <?php if (!empty($item['image_path'])): ?>
                            <img src="<?= htmlspecialchars(resolveImage($item['image_path'])) ?>" alt="">
                        <?php else: ?>
                            <div class="news-placeholder">📰</div>
                        <?php endif; ?>
                        <div class="body">
                            <div class="date"><?= date('M j, Y', strtotime($item['published_at'])) ?></div>
                            <h3><?= htmlspecialchars($item['title']) ?></h3>
                            <p><?= htmlspecialchars(mb_strimwidth(strip_tags($item['body']), 0, 110, '…')) ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="card" style="text-align:center; padding:48px;">
                <p style="margin:0; color:var(--ink-soft);">Nothing posted yet — check back soon for updates from the school.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
