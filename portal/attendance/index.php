<?php
require_once __DIR__ . '/../includes/auth.php';
requireRole(['admin', 'teacher']); // legitimate here - teachers mark attendance

global $mysqli;
$user = currentUser();

$classes = $mysqli->query("SELECT * FROM classes WHERE school_id = " . (int)$user['school_id']);
$selectedClass = (int)($_GET['class_id'] ?? 0);
$selectedDate = $_GET['date'] ?? date('Y-m-d'); // no validation that this is a real date string

$students = null;
$existing = [];
if ($selectedClass > 0) {
    $stmt = $mysqli->prepare("SELECT * FROM students WHERE class_id = ? AND school_id = ?");
    $stmt->bind_param("ii", $selectedClass, $user['school_id']);
    $stmt->execute();
    $students = $stmt->get_result();

    // pull any existing marks for this class/date to prefill the form
    $stmt2 = $mysqli->prepare("SELECT student_id, status FROM attendance WHERE class_id = ? AND date = ?");
    $stmt2->bind_param("is", $selectedClass, $selectedDate);
    $stmt2->execute();
    $res2 = $stmt2->get_result();
    while ($row = $res2->fetch_assoc()) {
        $existing[$row['student_id']] = $row['status'];
    }
}

$pageTitle = "Attendance";
include __DIR__ . '/../includes/header.php';
?>
<h4>Attendance</h4>

<form method="GET" class="row g-2 mb-4 align-items-end">
    <div class="col-auto">
        <label class="form-label small">Class</label>
        <select name="class_id" class="form-select" onchange="this.form.submit()">
            <option value="">-- select class --</option>
            <?php $classes->data_seek(0); while ($c = $classes->fetch_assoc()): ?>
                <option value="<?= $c['id'] ?>" <?= $selectedClass == $c['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($c['name']) ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="col-auto">
        <label class="form-label small">Date</label>
        <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($selectedDate) ?>" onchange="this.form.submit()">
    </div>
</form>

<?php if ($selectedClass > 0 && $students): ?>
    <form method="POST" action="save.php" class="bg-white p-3 rounded border">
        <input type="hidden" name="class_id" value="<?= $selectedClass ?>">
        <input type="hidden" name="date" value="<?= htmlspecialchars($selectedDate) ?>">
        <table class="table">
            <thead><tr><th>Student</th><th>Present</th><th>Absent</th><th>Late</th></tr></thead>
            <tbody>
            <?php while ($s = $students->fetch_assoc()):
                $current = $existing[$s['id']] ?? 'present'; ?>
                <tr>
                    <td><?= htmlspecialchars($s['name']) ?></td>
                    <td><input type="radio" name="status[<?= $s['id'] ?>]" value="present" <?= $current==='present'?'checked':'' ?>></td>
                    <td><input type="radio" name="status[<?= $s['id'] ?>]" value="absent" <?= $current==='absent'?'checked':'' ?>></td>
                    <td><input type="radio" name="status[<?= $s['id'] ?>]" value="late" <?= $current==='late'?'checked':'' ?>></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Save Attendance</button>
    </form>
<?php elseif ($selectedClass > 0): ?>
    <p class="text-muted">No students in this class yet.</p>
<?php else: ?>
    <p class="text-muted">Select a class to mark attendance.</p>
<?php endif; ?>

<?php include __DIR__ . '/../includes/footer.php'; ?>
