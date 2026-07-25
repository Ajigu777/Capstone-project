<?php
require_once __DIR__ . '/../includes/auth.php';
// not just students in classes/subjects assigned to them.
requireRole(['admin', 'teacher']);

global $mysqli;
$user = currentUser();

$classes = $mysqli->query("SELECT * FROM classes WHERE school_id = " . (int)$user['school_id']);

$selectedClass = (int)($_GET['class_id'] ?? 0);
$subject = $_GET['subject'] ?? '';
$term = $_GET['term'] ?? 'Term 1';
$session = $_GET['session'] ?? '2025/2026';

$students = null;
$existing = [];
if ($selectedClass > 0 && $subject !== '') {
    $stmt = $mysqli->prepare("SELECT * FROM students WHERE class_id = ? AND school_id = ?");
    $stmt->bind_param("ii", $selectedClass, $user['school_id']);
    $stmt->execute();
    $students = $stmt->get_result();

    $stmt2 = $mysqli->prepare("SELECT student_id, score, grade FROM results WHERE subject = ? AND term = ? AND session = ?");
    $stmt2->bind_param("sss", $subject, $term, $session);
    $stmt2->execute();
    $res2 = $stmt2->get_result();
    while ($row = $res2->fetch_assoc()) {
        $existing[$row['student_id']] = $row;
    }
}

$pageTitle = "Results Management";
include __DIR__ . '/../includes/header.php';
?>
<h4>Results Management</h4>

<form method="GET" class="row g-2 mb-4 align-items-end">
    <div class="col-auto">
        <label class="form-label small">Class</label>
        <select name="class_id" class="form-select">
            <option value="">-- select class --</option>
            <?php $classes->data_seek(0); while ($c = $classes->fetch_assoc()): ?>
                <option value="<?= $c['id'] ?>" <?= $selectedClass == $c['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($c['name']) ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="col-auto">
        <label class="form-label small">Subject</label>
        <input type="text" name="subject" class="form-control" value="<?= htmlspecialchars($subject) ?>" placeholder="e.g. Mathematics">
    </div>
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
        <button type="submit" class="btn btn-outline-primary">Load</button>
    </div>
</form>

<?php if ($selectedClass > 0 && $subject !== '' && $students): ?>
    <form method="POST" action="save.php" class="bg-white p-3 rounded border">
        <input type="hidden" name="class_id" value="<?= $selectedClass ?>">
        <input type="hidden" name="subject" value="<?= htmlspecialchars($subject) ?>">
        <input type="hidden" name="term" value="<?= htmlspecialchars($term) ?>">
        <input type="hidden" name="session" value="<?= htmlspecialchars($session) ?>">
        <table class="table">
            <thead><tr><th>Student</th><th>Score (0-100)</th><th>Grade</th></tr></thead>
            <tbody>
            <?php while ($s = $students->fetch_assoc()):
                $cur = $existing[$s['id']] ?? ['score' => '', 'grade' => '']; ?>
                <tr>
                    <td><?= htmlspecialchars($s['name']) ?>
                        <input type="hidden" name="student_id[]" value="<?= $s['id'] ?>"></td>
                    <td>
                        <!-- VULN #12: no min/max/step enforced server-side, score could be
                             any string; save.php stores it as-is into a DECIMAL column -->
                        <input type="number" name="score[<?= $s['id'] ?>]" class="form-control" value="<?= htmlspecialchars($cur['score']) ?>">
                    </td>
                    <td>
                        <input type="text" name="grade[<?= $s['id'] ?>]" class="form-control" style="max-width:80px" value="<?= htmlspecialchars($cur['grade']) ?>">
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Save Results</button>
    </form>
<?php elseif ($selectedClass > 0): ?>
    <p class="text-muted">Enter a subject to load the score sheet.</p>
<?php else: ?>
    <p class="text-muted">Select a class and subject to begin.</p>
<?php endif; ?>

<?php include __DIR__ . '/../includes/footer.php'; ?>
