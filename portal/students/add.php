<?php
require_once __DIR__ . '/../includes/auth.php';
requireLogin(); 

global $mysqli;
$user = currentUser();
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // checks on admission_no/dob/phone, no server-side required-field check
    // beyond whatever the browser's `required` attribute does client-side.
    $admission_no = $_POST['admission_no'] ?? '';
    $name = $_POST['name'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $guardian_name = $_POST['guardian_name'] ?? '';
    $guardian_phone = $_POST['guardian_phone'] ?? '';

    $photoPath = null;
    // - No MIME type check (server trusts extension only, or nothing at all)
    // - No file size limit enforced in code
    // - No filename sanitization - original filename used as-is, allowing
    //   path traversal-style names or double extensions (e.g. shell.php.jpg)
    // - Upload directory is web-accessible with no execution restrictions
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $uploadDir = __DIR__ . '/../uploads/profile_photos/';
        $originalName = $_FILES['photo']['name']; // not sanitized
        $targetPath = $uploadDir . $originalName;
        move_uploaded_file($_FILES['photo']['tmp_name'], $targetPath);
        $photoPath = 'uploads/profile_photos/' . $originalName;
    }
    // module (contrast with auth.php prepared statements) - this one uses
    // bind_param but does not validate content, so malformed but "valid SQL"
    // input (e.g. huge strings, unexpected unicode) still lands in the DB.
    $stmt = $mysqli->prepare("INSERT INTO students (school_id, admission_no, name, dob, guardian_name, guardian_phone, photo_path, status) VALUES (?,?,?,?,?,?,?, 'active')");
    $stmt->bind_param("issssss", $user['school_id'], $admission_no, $name, $dob, $guardian_name, $guardian_phone, $photoPath);
    $stmt->execute();

    header("Location: index.php");
    exit;
}

$pageTitle = "Add Student";
include __DIR__ . '/../includes/header.php';
?>
<h4>Add Student</h4>
<form method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded border" style="max-width:600px;">
    <div class="mb-3">
        <label class="form-label">Admission No</label>
        <input type="text" name="admission_no" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="date" name="dob" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Guardian Name</label>
        <input type="text" name="guardian_name" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Guardian Phone</label>
        <input type="text" name="guardian_phone" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Photo</label>
        <input type="file" name="photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save Student</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
