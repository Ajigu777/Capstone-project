<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = "News & Events";
$activePage = "news";

$stmt = $mysqli->prepare("SELECT * FROM news_events WHERE school_id = ? ORDER BY published_at DESC");
$stmt->bind_param("i", $SCHOOL_ID);
$stmt->execute();
$newsResult = $stmt->get_result();

include __DIR__ . '/includes/header.php';
?>

<header class="page-header">
    <div class="container">
        <span class="eyebrow">News &amp; Events</span>
        <h1>The Crestview Notice Board</h1>
        <p class="section-lede" style="margin:16px auto 0;">Everything happening around school, straight from our team.</p>
    </div>
</header>

<section class="section section-alt">
    <div class="container">
        <?php if ($newsResult && $newsResult->num_rows > 0): ?>
            <div class="card-grid">
                <?php while ($item = $newsResult->fetch_assoc()): ?>
                    <div class="news-card">
                        <?php if (!empty($item['image_path'])): ?>
                            <img src="<?= htmlspecialchars(resolveImage($item['image_path'])) ?>" alt="">
                        <?php else: ?>
                            <div style="aspect-ratio:16/9; background:linear-gradient(135deg,var(--sky),var(--sun)); display:flex; align-items:center; justify-content:center; font-size:40px;">📰</div>
                        <?php endif; ?>
                        <div class="body">
                            <div class="date"><?= date('M j, Y', strtotime($item['published_at'])) ?></div>
                            <h3><?= htmlspecialchars($item['title']) ?></h3>
                            <p><?= nl2br(htmlspecialchars($item['body'])) ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="card" style="text-align:center; padding:56px;">
                <div style="font-size:40px; margin-bottom:12px;">📰</div>
                <p style="margin:0; color:var(--ink-soft);">No news posted yet — check back soon.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
