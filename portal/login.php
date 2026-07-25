<?php
// portal/login.php
//
require_once __DIR__ . '/includes/auth.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (attemptLogin($email, $password)) {
        header("Location: dashboard.php");
        exit;
    } else {
        // and nothing more. This tells an attacker whether the account exists.
        $stmt = $GLOBALS['mysqli']->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        if ($stmt->get_result()->num_rows === 0) {
            $error = "No account found for email: " . htmlspecialchars($email);
        } else {
            $error = "Incorrect password for account: " . htmlspecialchars($email);
        }
    }
}
?>
<?php
$docRoot = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');
$portalDir = str_replace('\\', '/', __DIR__);
$baseUrl = str_replace($docRoot, '', $portalDir);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - School Management Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/portal.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body>
<div class="login-wrapper d-flex align-items-center justify-content-center p-3">
    <div class="card auth-card border-0 p-4 p-sm-5">
        <div class="text-center mb-4">
            <i class="ph ph-graduation-cap text-primary" style="font-size: 3.5rem;"></i>
            <h4 class="fw-bold mt-2">School Management Portal</h4>
            <p class="text-muted small">Sign in to continue</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger py-2 small"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <div class="mb-3">
                <label class="form-label fw-medium text-dark">Email</label>
                <input type="text" name="email" class="form-control form-control-lg fs-6" placeholder="Enter your email" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-medium text-dark">Password</label>
                <input type="password" name="password" class="form-control form-control-lg fs-6" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100 fs-6 d-flex align-items-center justify-content-center gap-2">
                <i class="ph ph-sign-in fs-5"></i> Login
            </button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
