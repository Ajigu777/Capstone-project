<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = "Home";
$activePage = "home";

// Pull latest 3 news items for the homepage teaser strip
$stmt = $mysqli->prepare("SELECT * FROM news_events WHERE school_id = ? ORDER BY published_at DESC LIMIT 3");
$stmt->bind_param("i", $SCHOOL_ID);
$stmt->execute();
$newsResult = $stmt->get_result();

include __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="eyebrow">Now enrolling for 2026/2027</span>
            <h1>Where curiosity gets<br><span class="accent">its first classroom.</span></h1>
            <p class="lede">
                Crestview Primary is a bright, welcoming school in Zaria where
                every child is known by name, every question is worth asking,
                and every day starts with something to look forward to.
            </p>
            <div class="btn-row">
                <a href="/crestview/admissions.php" class="btn btn-primary">Start Admissions &rarr;</a>
                <a href="/crestview/about.php" class="btn btn-secondary">Meet Our School</a>
            </div>
        </div>
        <div class="hero-art" aria-hidden="true">
            <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=600&h=500&auto=format&fit=crop" alt="Children learning" style="width:100%; border-radius:20px; box-shadow:0 20px 60px rgba(0,0,0,0.15); object-fit:cover; max-height:420px;">
        </div>
    </div>
</section>

<svg class="wave-divider" viewBox="0 0 1200 60" preserveAspectRatio="none">
    <path d="M0,30 C300,70 900,-10 1200,30 L1200,60 L0,60 Z" fill="#FFFFFF"/>
</svg>

<section class="section section-alt">
    <div class="container">
        <h2 class="section-title">A school day built around your child</h2>
        <p class="section-lede">Small class sizes, hands-on learning, and a campus designed for exploring — not just sitting still.</p>
        <div class="card-grid">
            <div class="card">
                <div class="icon bg-sun">📚</div>
                <h3>Balanced Curriculum</h3>
                <p>Literacy and numeracy fundamentals paired with art, music, and outdoor discovery time every week.</p>
            </div>
            <div class="card">
                <div class="icon bg-sky">🧑‍🏫</div>
                <h3>Caring Teachers</h3>
                <p>Small class sizes mean every teacher knows how each child learns best — and notices when they need a hand.</p>
            </div>
            <div class="card">
                <div class="icon bg-grass">🌳</div>
                <h3>Room to Play</h3>
                <p>Gardens, a sports field, and covered play areas built for a childhood full of running, not just sitting.</p>
            </div>
            <div class="card">
                <div class="icon bg-coral">🎉</div>
                <h3>A Real Community</h3>
                <p>Termly events, family days, and open classrooms keep parents close to what's happening at school.</p>
            </div>
        </div>
    </div>
</section>

<svg class="wave-divider" viewBox="0 0 1200 60" preserveAspectRatio="none">
    <path d="M0,30 C300,-10 900,70 1200,30 L1200,0 L0,0 Z" fill="#FFF8EC" style="display:none"/>
</svg>

<section class="section">
    <div class="container">
        <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:16px; margin-bottom:32px;">
            <div>
                <h2 class="section-title" style="margin-bottom:6px;">What's happening at Crestview</h2>
                <p class="section-lede" style="margin-bottom:0;">Fresh from the notice board.</p>
            </div>
            <a href="/crestview/news.php" class="btn btn-secondary">See all news →</a>
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
