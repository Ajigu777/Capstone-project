<?php
// portal/includes/header.php
// (no CSP, X-Frame-Options, HSTS, X-Content-Type-Options, etc). These are
// expected to be set at the Apache config level per VULNERABILITIES.md,
// and intentionally are NOT set there either in this build.
$user = currentUser();

// Calculate base URL dynamically to handle any XAMPP document root setup
$docRoot = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');
$portalDir = str_replace('\\', '/', realpath(__DIR__ . '/..'));
$baseUrl = str_replace($docRoot, '', $portalDir);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . " - " : "" ?>School Management Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/portal.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg glass-navbar px-4">
    <a href="/portal/dashboard.php" class="navbar-brand text-primary d-flex align-items-center gap-2">
        <i class="ph ph-graduation-cap fs-2"></i>
        <span class="fw-bold">School Management Portal</span>
    </a>
    <div class="ms-auto user-info d-flex align-items-center gap-4">
        <span class="d-flex align-items-center gap-2"><img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=32&h=32&fit=crop&crop=faces" alt="Avatar" class="rounded-circle" width="32" height="32"> <?= htmlspecialchars($user['name'] ?? '') ?> <span class="text-muted small">(<?= htmlspecialchars($user['role'] ?? '') ?>)</span></span>
        <a href="/portal/logout.php" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1"><i class="ph ph-sign-out"></i> Logout</a>
    </div>
</nav>
<div class="d-flex app-wrapper">
    <?php include __DIR__ . '/sidebar.php'; ?>
    <main class="main-content flex-grow-1 p-4">
