<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = "Gallery";
$activePage = "gallery";

$stmt = $mysqli->prepare("SELECT * FROM gallery WHERE school_id = ? ORDER BY id DESC");
$stmt->bind_param("i", $SCHOOL_ID);
$stmt->execute();
$photos = $stmt->get_result();

include __DIR__ . '/includes/header.php';
?>

<header class="page-header">
    <div class="container">
        <span class="eyebrow">Gallery</span>
        <h1>Life at Crestview</h1>
        <p class="section-lede" style="margin:16px auto 0;">A peek into our classrooms, events, and everyday moments.</p>
    </div>
</header>

<section class="section section-alt">
    <div class="container">
        <?php if ($photos && $photos->num_rows > 0): ?>
            <div class="gallery-grid">
                <?php while ($p = $photos->fetch_assoc()): ?>
                    <img src="<?= htmlspecialchars(resolveImage($p['image_path'])) ?>" alt="<?= htmlspecialchars($p['caption'] ?? '') ?>">
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="card" style="text-align:center; padding:56px;">
                <div style="font-size:40px; margin-bottom:12px;">📷</div>
                <p style="margin:0; color:var(--ink-soft);">Photos from the school will appear here soon — check back!</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
