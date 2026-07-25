<?php
require_once __DIR__ . '/../includes/auth.php';
requireRole(['admin', 'teacher']); 

global $mysqli;
$user = currentUser();

$students = $mysqli->query("SELECT * FROM students WHERE school_id = " . (int)$user['school_id'] . " ORDER BY name");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // no validation that student_id actually belongs to this school before insert
    $studentId = (int)($_POST['student_id'] ?? 0);
    $term = $_POST['term'] ?? '';
    $session = $_POST['session'] ?? '';
    $amountDue = $_POST['amount_due'] ?? 0;
    $amountPaid = $_POST['amount_paid'] ?? 0;

    $status = 'unpaid';
    if ($amountPaid >= $amountDue && $amountDue > 0) $status = 'paid';
    elseif ($amountPaid > 0) $status = 'partial';

    $stmt = $mysqli->prepare("INSERT INTO fees (student_id, term, session, amount_due, amount_paid, status) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("issdds", $studentId, $term, $session, $amountDue, $amountPaid, $status);
    $stmt->execute();

    header("Location: index.php?term=" . urlencode($term) . "&session=" . urlencode($session));
    exit;
}

$term = $_GET['term'] ?? 'Term 1';
$session = $_GET['session'] ?? '2025/2026';

$pageTitle = "Record Fee Payment";
include __DIR__ . '/../includes/header.php';
?>
<h4>Record Fee Payment</h4>
<form method="POST" class="bg-white p-4 rounded border" style="max-width:500px;">
    <div class="mb-3">
        <label class="form-label">Student</label>
        <select name="student_id" class="form-select">
            <?php $students->data_seek(0); while ($s = $students->fetch_assoc()): ?>
                <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['name']) ?> (<?= htmlspecialchars($s['admission_no']) ?>)</option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Term</label>
        <input type="text" name="term" class="form-control" value="<?= htmlspecialchars($term) ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Session</label>
        <input type="text" name="session" class="form-control" value="<?= htmlspecialchars($session) ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Amount Due</label>
        <input type="number" step="0.01" name="amount_due" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Amount Paid</label>
        <input type="number" step="0.01" name="amount_paid" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
