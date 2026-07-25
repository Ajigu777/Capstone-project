<?php
require_once __DIR__ . '/includes/auth.php';
requireLogin();

global $mysqli;
$user = currentUser();

$pwMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $name = $_POST['name'] ?? '';
    $stmt = $mysqli->prepare("UPDATE users SET name = ? WHERE id = ?");
    $stmt->bind_param("si", $name, $user['id']);
    $stmt->execute();
    $_SESSION['name'] = $name;
    header("Location: profile.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_password'])) {
    // allowing a change - anyone with an active session can silently take
    // over the account's future logins
    $newPassword = $_POST['new_password'] ?? '';
    $hash = md5($newPassword); 
    $stmt = $mysqli->prepare("UPDATE users SET password_hash = ? WHERE id = ?");
    $stmt->bind_param("si", $hash, $user['id']);
    $stmt->execute();
    $pwMessage = "Password updated.";
}

$pageTitle = "My Profile";
include __DIR__ . '/includes/header.php';
?>
<div class="d-flex align-items-center gap-4 mb-4">
    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=faces" alt="Avatar" class="rounded-circle shadow-sm" width="100" height="100">
    <div>
        <h4 class="mb-1">My Profile</h4>
        <p class="text-muted mb-0">Manage your account settings</p>
    </div>
</div>
<form method="POST" class="bg-white p-4 rounded border" style="max-width:500px;">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" value="<?= htmlspecialchars($_SESSION['email'] ?? '') ?>" disabled>
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

<h5 class="mt-4">Change Password</h5>
<?php if ($pwMessage): ?>
    <div class="alert alert-success py-2 small"><?= htmlspecialchars($pwMessage) ?></div>
<?php endif; ?>
<!-- VULN #13: no CSRF token. VULN #12/#2: no current-password check, no
     complexity requirement shown or enforced on new_password. -->
<form method="POST" class="bg-white p-4 rounded border" style="max-width:500px;">
    <div class="mb-3">
        <label class="form-label">New Password</label>
        <input type="password" name="new_password" class="form-control">
    </div>
    <button type="submit" class="btn btn-outline-primary">Update Password</button>
</form>

<?php include __DIR__ . '/includes/footer.php'; ?>
