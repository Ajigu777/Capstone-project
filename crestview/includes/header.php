<?php
// crestview/includes/header.php
// Expects $pageTitle and optionally $activePage to be set before include
$docRoot = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');
$siteDir = str_replace('\\', '/', realpath(__DIR__ . '/..'));
$baseUrl  = str_replace($docRoot, '', $siteDir);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . " – " : "" ?>Crestview Primary School</title>
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/crestview.css">
</head>
<body>
<nav class="navbar">
    <div class="navbar-inner">
        <a href="/crestview/index.php" class="brand">
            <span class="brand-badge">🌻</span>
            Crestview Primary
        </a>
        <button class="nav-toggle" onclick="document.getElementById('navLinks').classList.toggle('open')" aria-label="Toggle menu">☰</button>
        <div class="nav-links" id="navLinks">
            <a href="/crestview/index.php" class="<?= ($activePage ?? '') === 'home' ? 'active' : '' ?>">Home</a>
            <a href="/crestview/about.php" class="<?= ($activePage ?? '') === 'about' ? 'active' : '' ?>">About</a>
            <a href="/crestview/admissions.php" class="<?= ($activePage ?? '') === 'admissions' ? 'active' : '' ?>">Admissions</a>
            <a href="/crestview/academics.php" class="<?= ($activePage ?? '') === 'academics' ? 'active' : '' ?>">Academics</a>
            <a href="/crestview/gallery.php" class="<?= ($activePage ?? '') === 'gallery' ? 'active' : '' ?>">Gallery</a>
            <a href="/crestview/news.php" class="<?= ($activePage ?? '') === 'news' ? 'active' : '' ?>">News &amp; Events</a>
            <a href="/crestview/contact.php" class="<?= ($activePage ?? '') === 'contact' ? 'active' : '' ?>">Contact</a>
        </div>
    </div>
</nav>
