<?php
require_once __DIR__ . '/../includes/auth.php';
// records and should be admin-only. Instead it reuses the same
// requireRole(['admin','teacher']) pattern as everything else, so any
// teacher can view AND edit every family's payment status below.
requireRole(['admin', 'teacher']);

global $mysqli;
$user = currentUser();
$term = $_GET['term'] ?? 'Term 1';
$session = $_GET['session'] ?? '2025/2026';

$sql = "SELECT f.*, s.name AS student_name, s.admission_no
        FROM fees f
        JOIN students s ON s.id = f.student_id
        WHERE s.school_id = ? AND f.term = ? AND f.session = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("iss", $user['school_id'], $term, $session);
$stmt->execute();
$result = $stmt->get_result();

$pageTitle = "School Fees";
include __DIR__ . '/../includes/header.php';
?>
<h4>School Fees Management</h4>

<div class="alert alert-warning small">
    ⚠️ This page is reachable by role=teacher. In a hardened version this
    module should be requireRole(['admin']) only (VULN #20).
</div>

<div class="d-flex justify-content-between mb-3">
    <form method="GET" class="row g-2 align-items-end">
        <div class="col-auto">
            <label class="form-label small">Term</label>
            <select name="term" class="form-select">
                <?php foreach (['Term 1','Term 2','Term 3'] as $t): ?>
                    <option value="<?= $t ?>" <?= $term===$t?'selected':'' ?>><?= $t ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-auto">
            <label class="form-label small">Session</label>
            <input type="text" name="session" class="form-control" value="<?= htmlspecialchars($session) ?>">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-outline-primary">Filter</button>
        </div>
    </form>
    <a href="add.php?term=<?= urlencode($term) ?>&session=<?= urlencode($session) ?>" class="btn btn-primary btn-sm align-self-end">+ Record Payment</a>
</div>

<table class="table table-bordered bg-white">
    <thead><tr><th>Admission No</th><th>Student</th><th>Amount Due</th><th>Amount Paid</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['admission_no']) ?></td>
                <td><?= htmlspecialchars($row['student_name']) ?></td>
                <td><?= htmlspecialchars($row['amount_due']) ?></td>
                <td><?= htmlspecialchars($row['amount_paid']) ?></td>
                <td><span class="badge bg-<?= $row['status']==='paid'?'success':($row['status']==='partial'?'warning':'danger') ?>"><?= $row['status'] ?></span></td>
                <td><a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="6" class="text-muted text-center">No fee records for this term/session.</td></tr>
    <?php endif; ?>
    </tbody>
</table>

<?php include __DIR__ . '/../includes/footer.php'; ?>
