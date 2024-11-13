<?php
$pageTitle = "Reviews";
include "view-header.php"; // Include the header

require_once("model-reviews.php"); // Include the model for database interaction

// Get reviews from the database
$reviews = selectReviews();
?>

<div class="container reviews-container">
    <h1 class="rubik-glitch-regular">Customer Reviews</h1>
    <p>See what our customers have to say about our products:</p>

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
include "view-footer.php"; // Include the footer
?>
