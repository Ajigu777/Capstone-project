<?php
require_once __DIR__ . '/../includes/auth.php';
// teachers can add OTHER teachers, not just admins.
requireRole(['admin', 'teacher']);

global $mysqli;
$user = currentUser();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $userId = null;
    // If an email/password was given, also create a login account for them
    if ($email && $password) {
        $stmt = $mysqli->prepare("INSERT INTO users (school_id, name, email, password_hash, role) VALUES (?,?,?,?, 'teacher')");
        $hash = md5($password);
        $stmt->bind_param("isss", $user['school_id'], $name, $email, $hash);
        $stmt->execute();
        $userId = $mysqli->insert_id;
    }

    $stmt = $mysqli->prepare("INSERT INTO teachers (school_id, user_id, name, subject, phone) VALUES (?,?,?,?,?)");
    $stmt->bind_param("iisss", $user['school_id'], $userId, $name, $subject, $phone);
    $stmt->execute();

    header("Location: index.php");
    exit;
}

$pageTitle = "Add Teacher";
include __DIR__ . '/../includes/header.php';
?>
<h4>Add Teacher</h4>
<form method="POST" class="bg-white p-4 rounded border" style="max-width:500px;">
    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Subject</label>
        <input type="text" name="subject" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control">
    </div>
    <hr>
    <p class="text-muted small">Optional: create a portal login for this teacher</p>
    <div class="mb-3">
        <label class="form-label">Login Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Login Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save Teacher</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
