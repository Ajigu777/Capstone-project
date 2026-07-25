<?php
// shared/config/db.php
// Shared MySQL connection used by Crestview, Horizon, and the Portal.
//
// VULN NOTE (VULNERABILITIES.md #5, #16):
// - Credentials hardcoded in plaintext, not loaded from environment/.env
// - No file permission restriction called out (see deployment notes)
// - Error reporting left on so failed connections leak host/user details

$DB_HOST = "fdb30.awardspace.net";
$DB_NAME = "4776368_martins";
$DB_USER = "4776368_martins";
$DB_PASS = "Mymomisgreat54#";

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// VULN #5 - Verbose Error Messages
// Real connection errors (host, user, driver detail) are echoed straight
// to the browser instead of being logged server-side and shown generically.
if ($mysqli->connect_error) {
    die("Database connection failed: " . $mysqli->connect_error .
        " (errno " . $mysqli->connect_errno . ")");
}
?>
