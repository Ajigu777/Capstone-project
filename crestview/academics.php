<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = "Academics";
$activePage = "academics";
include __DIR__ . '/includes/header.php';
?>

<header class="page-header">
    <div class="container">
        <span class="eyebrow">Academics</span>
        <h1>A curriculum built for young learners</h1>
        <p class="section-lede" style="margin:16px auto 0;">Strong fundamentals, taught in ways that keep children curious rather than counting down the minutes.</p>
    </div>
</header>

<section class="section section-alt">
    <div class="container">
        <h2 class="section-title">Subjects We Teach</h2>
        <div class="card-grid">
            <div class="card">
                <div class="icon bg-sun">🔤</div>
                <h3>Literacy</h3>
                <p>Phonics, reading, and storytelling that build confident young readers and writers.</p>
            </div>
            <div class="card">
                <div class="icon bg-sky">🔢</div>
                <h3>Numeracy</h3>
                <p>Hands-on number work that makes math feel like solving puzzles, not memorizing rules.</p>
            </div>
            <div class="card">
                <div class="icon bg-grass">🌱</div>
                <h3>Basic Science</h3>
                <p>Simple experiments and nature study that turn "why?" into a favorite word.</p>
            </div>
            <div class="card">
                <div class="icon bg-coral">🎨</div>
                <h3>Creative Arts</h3>
                <p>Art, music, and craft time built into every week, not treated as an extra.</p>
            </div>
        </div>
    </div>
</section>

<svg class="wave-divider" viewBox="0 0 1200 60" preserveAspectRatio="none">
    <path d="M0,30 C300,-10 900,70 1200,30 L1200,60 L0,60 Z" fill="#FFF8EC"/>
</svg>

<section class="section">
    <div class="container two-col">
        <img class="blob-img" src="https://images.unsplash.com/photo-1497486751825-1233686d5d80?w=800&q=80" alt="Children doing an art project">
        <div>
            <h2 class="section-title">How a Typical Day Looks</h2>
            <p>Mornings open with a class circle, followed by focused literacy and numeracy blocks while attention is freshest. Afternoons make room for science, art, and outdoor play — because a good school day has a rhythm, not just a schedule.</p>
            <p>Class sizes stay small enough that every teacher tracks each child's progress closely, and adjusts the pace when a topic needs a little more time to click.</p>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
