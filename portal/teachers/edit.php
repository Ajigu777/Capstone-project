<?php
require_once __DIR__ . '/../includes/auth.php';
requireRole(['admin', 'teacher']); 

global $mysqli;
$user = currentUser();
$id = (int)($_GET['id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $id = (int)($_POST['id'] ?? 0);

    $stmt = $mysqli->prepare("UPDATE teachers SET name=?, subject=?, phone=? WHERE id=? AND school_id=?");
    $stmt->bind_param("sssii", $name, $subject, $phone, $id, $user['school_id']);
    $stmt->execute();

    header("Location: index.php");
    exit;
}

$stmt = $mysqli->prepare("SELECT * FROM teachers WHERE id = ? AND school_id = ?");
$stmt->bind_param("ii", $id, $user['school_id']);
$stmt->execute();
$teacher = $stmt->get_result()->fetch_assoc();

$pageTitle = "Edit Teacher";
include __DIR__ . '/../includes/header.php';

if (!$teacher) {
    echo '<div class="alert alert-danger">Teacher not found.</div>';
    include __DIR__ . '/../includes/footer.php';
    exit;
}
?>
<h4>Edit Teacher</h4>
<form method="POST" class="bg-white p-4 rounded border" style="max-width:500px;">
    <input type="hidden" name="id" value="<?= $teacher['id'] ?>">
    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($teacher['name']) ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Subject</label>
        <input type="text" name="subject" class="form-control" value="<?= htmlspecialchars($teacher['subject']) ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($teacher['phone']) ?>">
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
