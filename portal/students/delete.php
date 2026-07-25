<?php
require_once __DIR__ . '/../includes/auth.php';
requireLogin(); 

global $mysqli;
$user = currentUser();
// plain GET request with no confirmation token and no CSRF protection.
// An attacker who gets a logged-in admin to click/load a crafted link
// (e.g. an <img src="...delete.php?id=5">) can delete records silently.
$id = (int)($_GET['id'] ?? 0);

if ($id > 0) {
    $stmt = $mysqli->prepare("DELETE FROM students WHERE id = ? AND school_id = ?");
    $stmt->bind_param("ii", $id, $user['school_id']);
    $stmt->execute();
}

header("Location: index.php");
exit;
?>
