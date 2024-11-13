<?php
$pageTitle = "Customer Reviews";
include "view-header.php"; // Include header

require_once("model-reviews.php");

// Get reviews from the database
$reviews = selectReviews();
?>

<div class="container">
    <h1 class="rubik-glitch-regular">CUSTOMER REVIEWS</h1>

    <?php if (!empty($reviews)): ?>
        <?php foreach ($reviews as $review): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Review by <?= htmlspecialchars($review['ReviewerName']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($review['ReviewText']) ?></p>
                    <p><strong>Rating:</strong> <?= htmlspecialchars($review['Rating']) ?> / 5</p>
                    <p class="text-muted">Reviewed on <?= date("F j, Y", strtotime($review['ReviewDate'])) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No reviews available at the moment. Be the first to leave a review!</p>
    <?php endif; ?>
</div>

<?php
include "view-footer.php"; // Include footer
?>
