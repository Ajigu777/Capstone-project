<?php
// portal/includes/sidebar.php
//
// user regardless of role. Actual enforcement (or lack thereof) happens
// per-page, so a teacher SEES links to Fees Management, Teacher Management,
// etc. even on pages that arguably should be admin-only - and on several
// stub pages in this skeleton, clicking through actually works because
// requireRole() was never called (see students/index.php vs fees/index.php
// notes in VULNERABILITIES.md).
$navItems = [
    'dashboard.php' => ['label' => 'Dashboard', 'icon' => 'ph-squares-four'],
    'students/index.php' => ['label' => 'Student Management', 'icon' => 'ph-users'],
    'teachers/index.php' => ['label' => 'Teacher Management', 'icon' => 'ph-chalkboard-teacher'],
    'attendance/index.php' => ['label' => 'Attendance', 'icon' => 'ph-calendar-check'],
    'results/index.php' => ['label' => 'Results Management', 'icon' => 'ph-notebook'],
    'fees/index.php' => ['label' => 'School Fees', 'icon' => 'ph-currency-circle-dollar'],
    'announcements/index.php' => ['label' => 'Announcements', 'icon' => 'ph-megaphone'],
    'profile.php' => ['label' => 'My Profile', 'icon' => 'ph-user-gear'],
];
?>
<aside class="sidebar">
    <ul class="nav nav-pills flex-column gap-1 w-100 mb-0">
        <?php foreach ($navItems as $href => $item): ?>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-3 py-2 px-3" href="/portal/<?= $href ?>">
                    <i class="ph <?= $item['icon'] ?> fs-5"></i>
                    <span class="fw-medium"><?= $item['label'] ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</aside>
