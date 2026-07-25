<?php
require_once __DIR__ . '/../includes/auth.php';
// admin-only, but 'teacher' was copy-pasted into the allowed roles list,
// meaning any teacher can view/add/edit OTHER teachers' records, including
// (once results/fees modules are built out) reassigning subjects.
requireRole(['admin', 'teacher']);

global $mysqli;
$user = currentUser();
$result = $mysqli->query("SELECT * FROM teachers WHERE school_id = " . (int)$user['school_id']);

$pageTitle = "Teacher Management";
include __DIR__ . '/../includes/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Teacher Management</h4>
    <a href="add.php" class="btn btn-primary btn-sm">+ Add Teacher</a>
</div>

<table class="table table-bordered bg-white">
    <thead><tr><th>Name</th><th>Subject</th><th>Phone</th><th>Actions</th></tr></thead>
    <tbody>
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['subject']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger"
                       onclick="return confirm('Delete this teacher?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="4" class="text-muted text-center">No teachers yet.</td></tr>
    <?php endif; ?>
    </tbody>
</table>
<?php include __DIR__ . '/../includes/footer.php'; ?>
