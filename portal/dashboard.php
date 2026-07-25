<?php
require_once __DIR__ . '/includes/auth.php';
requireLogin();

$pageTitle = "Dashboard";
$user = currentUser();
include __DIR__ . '/includes/header.php';
?>
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3>Welcome, <?= htmlspecialchars($user['name']) ?></h3>
        <p class="text-muted mb-0">Role: <?= htmlspecialchars($user['role']) ?> | School ID: <?= htmlspecialchars($user['school_id']) ?></p>
    </div>
</div>

<div class="card border-0 mb-4 overflow-hidden rounded-4 shadow-sm">
    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=1200&h=300&fit=crop" class="card-img-top" alt="School Banner" style="height: 200px; object-fit: cover;">
</div>
<div class="row g-4 mt-3">
    <div class="col-md-3">
        <div class="card border-0 p-4 d-flex flex-row align-items-center justify-content-between h-100">
            <div>
                <div class="fs-3 fw-bold text-dark">--</div>
                <div class="text-secondary small fw-medium mt-1">Students</div>
            </div>
            <div class="stat-icon bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                <i class="ph ph-users fs-3"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 p-4 d-flex flex-row align-items-center justify-content-between h-100">
            <div>
                <div class="fs-3 fw-bold text-dark">--</div>
                <div class="text-secondary small fw-medium mt-1">Teachers</div>
            </div>
            <div class="stat-icon bg-info bg-opacity-10 text-info rounded-circle d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                <i class="ph ph-chalkboard-teacher fs-3"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 p-4 d-flex flex-row align-items-center justify-content-between h-100">
            <div>
                <div class="fs-3 fw-bold text-dark">--</div>
                <div class="text-secondary small fw-medium mt-1">Attendance Today</div>
            </div>
            <div class="stat-icon bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                <i class="ph ph-calendar-check fs-3"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 p-4 d-flex flex-row align-items-center justify-content-between h-100">
            <div>
                <div class="fs-3 fw-bold text-dark">--</div>
                <div class="text-secondary small fw-medium mt-1">Outstanding Fees</div>
            </div>
            <div class="stat-icon bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                <i class="ph ph-currency-circle-dollar fs-3"></i>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
