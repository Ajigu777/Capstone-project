<?php
require_once __DIR__ . '/../includes/auth.php';
requireRole(['admin', 'teacher']); 

global $mysqli;
$user = currentUser();
$id = (int)($_GET['id'] ?? 0);

if ($id > 0) {
    $stmt = $mysqli->prepare("DELETE FROM teachers WHERE id = ? AND school_id = ?");
    $stmt->bind_param("ii", $id, $user['school_id']);
    $stmt->execute();
}

header("Location: index.php");
exit;
?>
