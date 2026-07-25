<?php
require_once __DIR__ . '/../includes/auth.php';
requireRole(['admin', 'teacher']);

global $mysqli;
$user = currentUser();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $classId = (int)($_POST['class_id'] ?? 0);
    $date = $_POST['date'] ?? ''; 
    $statuses = $_POST['status'] ?? [];

    foreach ($statuses as $studentId => $status) {
        $studentId = (int)$studentId;
        // relies entirely on MySQL to reject bad values, and does so with no
        // graceful handling (would just throw/warn if it somehow got past the radios)
        $check = $mysqli->prepare("SELECT id FROM attendance WHERE student_id = ? AND date = ?");
        $check->bind_param("is", $studentId, $date);
        $check->execute();
        $existing = $check->get_result()->fetch_assoc();

        if ($existing) {
            $upd = $mysqli->prepare("UPDATE attendance SET status = ?, marked_by = ? WHERE id = ?");
            $upd->bind_param("sii", $status, $user['id'], $existing['id']);
            $upd->execute();
        } else {
            $ins = $mysqli->prepare("INSERT INTO attendance (student_id, class_id, date, status, marked_by) VALUES (?,?,?,?,?)");
            $ins->bind_param("iissi", $studentId, $classId, $date, $status, $user['id']);
            $ins->execute();
        }
    }

    header("Location: index.php?class_id=$classId&date=" . urlencode($date));
    exit;
}

header("Location: index.php");
exit;
?>
