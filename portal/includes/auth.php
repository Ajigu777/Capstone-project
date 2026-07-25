<?php
// portal/includes/auth.php
//
// #9  Insecure Session Cookie Configuration - no secure/httponly/samesite flags set
// #10 Missing Session Timeout           - session never expires while browser is open
// #11 Weak Role-Based Access Control    - requireRole() is easily bypassed / inconsistently applied
// #20 Excessive Teacher Privileges      - teacher role treated ~equal to admin in most checks

// Default PHP session settings are used as-is: no session.cookie_secure,
// no session.cookie_httponly, no session.cookie_samesite override here or in php.ini.
session_start();

require_once __DIR__ . '/../../shared/config/db.php';

/**
 * Authenticate a user by email + password.
 *          passwords like "password123" are valid and common.
 *          this function can be called as many times per second as an
 *          attacker likes with no throttling at all.
 * (SQL uses parameter binding here - injection is NOT in scope for this
 * particular function, but note other modules may not be as careful.)
 */
function attemptLogin($email, $password) {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT id, school_id, name, password_hash, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if ($user && $user['password_hash'] === md5($password)) {
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['school_id'] = $user['school_id'];
        $_SESSION['name']      = $user['name'];
        $_SESSION['role']      = $user['role'];
        $_SESSION['email']     = $email;
        return true;
    }
    return false;
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

/**
 * it's easy for a developer to forget to call this on a new page (and
 * several stub pages in this skeleton do forget - see students/, fees/).
 * There's also no centralized enforcement (e.g. no front controller),
 * so protection is opt-in per file rather than default-deny.
 */
function requireRole($roles = []) {
    if (!isLoggedIn()) {
        header("Location: /portal/login.php");
        exit;
    }
    // by copy-pasted checks across modules (e.g. fees, teacher management)
    // even where only admins should have access - see module stubs.
    if (!empty($roles) && !in_array($_SESSION['role'], $roles)) {
        header("Location: /portal/dashboard.php");
        exit;
    }
}

function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: /portal/login.php");
        exit;
    }
    // so a session is valid indefinitely once created.
}

function currentUser() {
    return [
        'id' => $_SESSION['user_id'] ?? null,
        'school_id' => $_SESSION['school_id'] ?? null,
        'name' => $_SESSION['name'] ?? null,
        'role' => $_SESSION['role'] ?? null,
    ];
}
?>
