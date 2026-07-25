<?php
// crestview/includes/config.php
require_once __DIR__ . '/../../shared/config/db.php';

// This public site always represents school_id 1 (Crestview) per the
// seed data in shared/config/schema.sql.
$SCHOOL_ID = 1;
$SCHOOL_NAME = "Crestview Primary School";

/**
 * Resolve an image_path value from the DB into a usable <img src>.
 * Handles both full URLs (e.g. seeded Unsplash links) and relative paths
 * (e.g. real uploads under /portal/uploads/...) without double-prefixing.
 */
function resolveImage($path) {
    if (empty($path)) return '';
    if (preg_match('#^https?://#i', $path)) {
        return $path;
    }
    return '/' . ltrim($path, '/');
}
?>
