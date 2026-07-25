<?php
require_once __DIR__ . '/../includes/auth.php';
// actions at minimum, but only requireLogin() is called - ANY authenticated
// user (including teachers) has full add/edit/delete access to student
// records here, not just read access to their own class.
requireLogin();

global $mysqli;
$user = currentUser();
// in this module (see students/edit.php stub note in VULNERABILITIES.md)
$result = $mysqli->query("SELECT * FROM students WHERE school_id = " . (int)$user['school_id']);

$pageTitle = "Student Management";
include __DIR__ . '/../includes/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Student Management</h4>
    <a href="add.php" class="btn btn-primary btn-sm">+ Add Student</a>
</div>

<table class="table table-bordered bg-white">
    <thead>
        <tr><th>Admission No</th><th>Name</th><th>Class</th><th>Status</th><th>Actions</th></tr>
    </thead>
    <tbody>
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['admission_no']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['class_id']) ?></td>
                <td><?= htmlspecialchars($row['status']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger"
                       onclick="return confirm('Delete this student?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="5" class="text-muted text-center">No students yet.</td></tr>
    <?php endif; ?>
    </tbody>
</table>

<?php include __DIR__ . '/../includes/footer.php'; ?>
