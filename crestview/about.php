<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = "About";
$activePage = "about";
include __DIR__ . '/includes/header.php';
?>

<header class="page-header">
    <div class="container">
        <span class="eyebrow">About Us</span>
        <h1>A school built on knowing every child</h1>
        <p class="section-lede" style="margin:16px auto 0;">Crestview has been part of the Zaria community for years, growing one curious class at a time.</p>
    </div>
</header>

<section class="section section-alt">
    <div class="container two-col">
        <div>
            <h2 class="section-title">Our Story</h2>
            <p>Crestview Primary School was founded on a simple idea: young children learn best in places where they feel safe, seen, and a little bit excited every morning. What started as a handful of classrooms has grown into a full primary school — but that founding idea hasn't changed.</p>
            <p>Today, Crestview serves families across Zaria with a curriculum that balances strong academic fundamentals with the kind of hands-on, curious learning that sticks.</p>
        </div>
        <img class="blob-img" src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=800&q=80" alt="Children in a bright classroom">
    </div>
</section>

<svg class="wave-divider" viewBox="0 0 1200 60" preserveAspectRatio="none">
    <path d="M0,30 C300,70 900,-10 1200,30 L1200,60 L0,60 Z" fill="#FFF8EC"/>
</svg>

<section class="section">
    <div class="container">
        <h2 class="section-title">What We Believe</h2>
        <p class="section-lede">The principles that guide every classroom decision we make.</p>
        <div class="card-grid">
            <div class="card">
                <div class="icon bg-sun">💛</div>
                <h3>Every Child, Known</h3>
                <p>Small classes so no child is just a face in the crowd.</p>
            </div>
            <div class="card">
                <div class="icon bg-sky">🔎</div>
                <h3>Curiosity First</h3>
                <p>Questions are welcomed, not just answers memorized.</p>
            </div>
            <div class="card">
                <div class="icon bg-grass">🤝</div>
                <h3>Real Partnership</h3>
                <p>Parents and teachers working from the same page, always.</p>
            </div>
        </div>
    </div>
</section>

<svg class="wave-divider" viewBox="0 0 1200 60" preserveAspectRatio="none">
    <path d="M0,30 C300,-10 900,70 1200,30 L1200,60 L0,60 Z" fill="#FFFFFF"/>
</svg>

<section class="section section-alt">
    <div class="container">
        <h2 class="section-title">Our Leadership</h2>
        <p class="section-lede">Crestview is proudly owned and led as part of the Martins Schools group.</p>
        <div class="card" style="max-width:520px;">
            <div class="icon bg-coral">🏫</div>
            <h3>A Two-School Family</h3>
            <p>Crestview Primary shares its founding vision with Horizon Secondary School — one educational journey, from a child's first day of school through graduation.</p>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
