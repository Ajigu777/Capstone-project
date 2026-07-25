<?php
require_once __DIR__ . '/../includes/auth.php';
requireRole(['admin', 'teacher']); 

global $mysqli;
$user = currentUser();
$id = (int)($_GET['id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $amountDue = $_POST['amount_due'] ?? 0;
    $amountPaid = $_POST['amount_paid'] ?? 0;

    $status = 'unpaid';
    if ($amountPaid >= $amountDue && $amountDue > 0) $status = 'paid';
    elseif ($amountPaid > 0) $status = 'partial';
    // the current user's school before allowing the update
    $stmt = $mysqli->prepare("UPDATE fees SET amount_due = ?, amount_paid = ?, status = ? WHERE id = ?");
    $stmt->bind_param("ddsi", $amountDue, $amountPaid, $status, $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}

$stmt = $mysqli->prepare("SELECT f.*, s.name AS student_name FROM fees f JOIN students s ON s.id = f.student_id WHERE f.id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$fee = $stmt->get_result()->fetch_assoc();

$pageTitle = "Edit Fee Record";
include __DIR__ . '/../includes/header.php';

if (!$fee) {
    echo '<div class="alert alert-danger">Record not found.</div>';
    include __DIR__ . '/../includes/footer.php';
    exit;
}
?>
<h4>Edit Fee Record — <?= htmlspecialchars($fee['student_name']) ?></h4>
<form method="POST" class="bg-white p-4 rounded border" style="max-width:500px;">
    <input type="hidden" name="id" value="<?= $fee['id'] ?>">
    <div class="mb-3">
        <label class="form-label">Term / Session</label>
        <input type="text" class="form-control" value="<?= htmlspecialchars($fee['term'] . ' - ' . $fee['session']) ?>" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Amount Due</label>
        <input type="number" step="0.01" name="amount_due" class="form-control" value="<?= htmlspecialchars($fee['amount_due']) ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Amount Paid</label>
        <input type="number" step="0.01" name="amount_paid" class="form-control" value="<?= htmlspecialchars($fee['amount_paid']) ?>">
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
