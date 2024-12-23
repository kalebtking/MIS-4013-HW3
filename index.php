<?php
$pageTitle = "Home";
include "view-header.php"; // Include the shared header
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
        <h2>Guided Runs</h2>
        <p>Join our guided group runs led by experienced coaches. Check out upcoming sessions and reserve your spot to improve your running experience with expert guidance.</p>
        <a href="guided-runs.php" class="cta-button">Explore Guided Runs</a>
    </div>

    <div class="home-section">
        <h2>Customer Reviews</h2>
        <p>Don’t just take our word for it – see what our customers have to say about our products and how they have improved their running experience.</p>
        <a href="reviews.php" class="cta-button">Read Reviews</a>
    </div>
</div>

<?php
include "view-footer.php"; // Include the shared footer
?>
