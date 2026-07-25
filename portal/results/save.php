<?php
require_once __DIR__ . '/../includes/auth.php';
requireRole(['admin', 'teacher']); 

global $mysqli;
$user = currentUser();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'] ?? '';
    $term = $_POST['term'] ?? '';
    $session = $_POST['session'] ?? '';
    $scores = $_POST['score'] ?? [];
    $grades = $_POST['grade'] ?? [];

    foreach ($scores as $studentId => $score) {
        $studentId = (int)$studentId;
        $grade = $grades[$studentId] ?? '';
        $check = $mysqli->prepare("SELECT id FROM results WHERE student_id = ? AND subject = ? AND term = ? AND session = ?");
        $check->bind_param("isss", $studentId, $subject, $term, $session);
        $check->execute();
        $existing = $check->get_result()->fetch_assoc();

        if ($existing) {
            $upd = $mysqli->prepare("UPDATE results SET score = ?, grade = ?, entered_by = ? WHERE id = ?");
            $upd->bind_param("dsii", $score, $grade, $user['id'], $existing['id']);
            $upd->execute();
        } else {
            $ins = $mysqli->prepare("INSERT INTO results (student_id, subject, term, session, score, grade, entered_by) VALUES (?,?,?,?,?,?,?)");
            $ins->bind_param("isssdsi", $studentId, $subject, $term, $session, $score, $grade, $user['id']);
            $ins->execute();
        }
    }

    $classId = (int)($_POST['class_id'] ?? 0);
    header("Location: index.php?class_id=" . $classId .
           "&subject=" . urlencode($subject) . "&term=" . urlencode($term) . "&session=" . urlencode($session));
    exit;
}

header("Location: index.php");
exit;
?>
