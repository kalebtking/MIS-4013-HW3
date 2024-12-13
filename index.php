<?php
$pageTitle = "Home";
include "view-header.php";
require_once "model-guided-runs.php";

// Fetch the next upcoming guided run
$runs = getGuidedRuns();
$nextRun = count($runs) > 0 ? $runs[0] : null;
?>

<div class="container home-container">
    <h1 class="home-header rubik-glitch-regular">WELCOME TO RUN</h1>

    <div class="home-section">
        <h2>About Us</h2>
        <p>At RUN, we are dedicated to providing premium-quality running shoes and apparel to athletes of all levels. Our mission is to empower you with products that enhance your performance, comfort, and style.</p>
        <a href="about.php" class="cta-button">Learn More</a>
    </div>

    <div class="home-section">
        <h2>Featured Products</h2>
        <p>Discover our latest collection of running gear designed to help you achieve your personal best. From lightweight running shoes to moisture-wicking apparel, RUN has you covered.</p>
        <a href="products.php" class="cta-button">Shop Now</a>
    </div>

    <div class="home-section">
        <h2>Next Guided Run</h2>
        <?php if ($nextRun): ?>
            <p>Join us for our next run:</p>
            <p><strong><?= htmlspecialchars($nextRun['RunDate']) ?> at <?= htmlspecialchars($nextRun['RunTime']) ?></strong></p>
            <p>Location: <?= htmlspecialchars($nextRun['Location']) ?></p>
            <div id="countdown"></div>
            <script>
                const runDate = new Date("<?= $nextRun['RunDate'] . 'T' . $nextRun['RunTime'] ?>").getTime();
                const countdownElement = document.getElementById('countdown');
                const interval = setInterval(() => {
                    const now = new Date().getTime();
                    const distance = runDate - now;

                    if (distance < 0) {
                        clearInterval(interval);
                        countdownElement.innerHTML = "The run has started!";
                    } else {
                        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
                    }
                }, 1000);
            </script>
            <a href="guided-runs.php" class="cta-button">View All Runs</a>
        <?php else: ?>
            <p>No upcoming guided runs at the moment. Check back later!</p>
        <?php endif; ?>
    </div>

    <div class="home-section">
        <h2>Customer Reviews</h2>
        <p>Don’t just take our word for it – see what our customers have to say about our products and how they have improved their running experience.</p>
        <a href="reviews.php" class="cta-button">Read Reviews</a>
    </div>
</div>

<?php include "view-footer.php"; ?>
