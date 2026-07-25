<?php
require_once __DIR__ . '/../includes/auth.php';
requireLogin(); // any logged-in user can post announcements - VULN #11, no admin-only gate on posting

global $mysqli;
$user = currentUser();
$result = $mysqli->query("SELECT * FROM announcements WHERE school_id = " . (int)$user['school_id'] . " ORDER BY created_at DESC");

$pageTitle = "Announcements";
include __DIR__ . '/../includes/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Announcements</h4>
    <a href="add.php" class="btn btn-primary btn-sm">+ New Announcement</a>
</div>

<?php if ($result && $result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="card mb-2 p-3">
            <strong><?= htmlspecialchars($row['title']) ?></strong>
            <p class="mb-1"><?= nl2br(htmlspecialchars($row['body'])) ?></p>
            <small class="text-muted"><?= $row['created_at'] ?></small>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p class="text-muted">No announcements yet.</p>
<?php endif; ?>

<?php include __DIR__ . '/../includes/footer.php'; ?>
