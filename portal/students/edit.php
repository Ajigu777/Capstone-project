<?php
require_once __DIR__ . '/../includes/auth.php';
requireLogin(); 

global $mysqli;
$user = currentUser();
$id = (int)($_GET['id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admission_no = $_POST['admission_no'] ?? '';
    $name = $_POST['name'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $guardian_name = $_POST['guardian_name'] ?? '';
    $guardian_phone = $_POST['guardian_phone'] ?? '';
    $status = $_POST['status'] ?? 'active';
    $id = (int)($_POST['id'] ?? 0);

    $photoPath = null;
    // original filename trusted as-is
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $uploadDir = __DIR__ . '/../uploads/profile_photos/';
        $originalName = $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $originalName);
        $photoPath = 'uploads/profile_photos/' . $originalName;
    }

    if ($photoPath) {
        $stmt = $mysqli->prepare("UPDATE students SET admission_no=?, name=?, dob=?, guardian_name=?, guardian_phone=?, status=?, photo_path=? WHERE id=?");
        $stmt->bind_param("sssssssi", $admission_no, $name, $dob, $guardian_name, $guardian_phone, $status, $photoPath, $id);
    } else {
        $stmt = $mysqli->prepare("UPDATE students SET admission_no=?, name=?, dob=?, guardian_name=?, guardian_phone=?, status=? WHERE id=?");
        $stmt->bind_param("ssssssi", $admission_no, $name, $dob, $guardian_name, $guardian_phone, $status, $id);
    }
    $stmt->execute();

    header("Location: index.php");
    exit;
}

$stmt = $mysqli->prepare("SELECT * FROM students WHERE id = ? AND school_id = ?");
$stmt->bind_param("ii", $id, $user['school_id']);
$stmt->execute();
$student = $stmt->get_result()->fetch_assoc();

$pageTitle = "Edit Student";
include __DIR__ . '/../includes/header.php';

if (!$student) {
    echo '<div class="alert alert-danger">Student not found.</div>';
    include __DIR__ . '/../includes/footer.php';
    exit;
}
?>
<h4>Edit Student</h4>
<form method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded border" style="max-width:600px;">
    <input type="hidden" name="id" value="<?= $student['id'] ?>">
    <div class="mb-3">
        <label class="form-label">Admission No</label>
        <input type="text" name="admission_no" class="form-control" value="<?= htmlspecialchars($student['admission_no']) ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($student['name']) ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="date" name="dob" class="form-control" value="<?= htmlspecialchars($student['dob']) ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Guardian Name</label>
        <input type="text" name="guardian_name" class="form-control" value="<?= htmlspecialchars($student['guardian_name']) ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Guardian Phone</label>
        <input type="text" name="guardian_phone" class="form-control" value="<?= htmlspecialchars($student['guardian_phone']) ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="active" <?= $student['status']==='active'?'selected':'' ?>>Active</option>
            <option value="inactive" <?= $student['status']==='inactive'?'selected':'' ?>>Inactive</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Replace Photo</label>
        <input type="file" name="photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
