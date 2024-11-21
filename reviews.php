<?php
$pageTitle = "Reviews";
include "view-header.php"; // Include the header

require_once("model-reviews.php"); // Include the model for database interaction

// Get reviews from the database
$reviews = selectReviews();
?>

<div class="container reviews-container">
    <h1 class="rubik-glitch-regular">CUSTOMER REVIEWS</h1>

    <!-- Display Notifications -->
    <?php if (isset($_GET["status"])): ?>
        <div class="alert alert-success">
            <?php if ($_GET["status"] === "added") echo "Review added successfully!"; ?>
            <?php if ($_GET["status"] === "edited") echo "Review updated successfully!"; ?>
            <?php if ($_GET["status"] === "deleted") echo "Review deleted successfully!"; ?>
            <?php if ($_GET["status"] === "error") echo "An error occurred. Please try again."; ?>
        </div>
    <?php endif; ?>

    <!-- Add Review Button -->
    <div class="mb-4">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addReviewModal">Add Review</button>
    </div>

    <?php if (!empty($reviews)): ?>
        <?php foreach ($reviews as $review): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Review by <?= htmlspecialchars($review['ReviewerName']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($review['ReviewText']) ?></p>
                    <p><strong>Rating:</strong> <?= htmlspecialchars($review['Rating']) ?> / 5</p>
                    <p class="text-muted">Reviewed on <?= date("F j, Y", strtotime($review['ReviewDate'])) ?></p>

                    <!-- Edit and Delete Buttons -->
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editReviewModal<?= $review['ReviewID'] ?>">Edit</button>
                    <form action="delete-review.php" method="post" class="d-inline">
                        <input type="hidden" name="ReviewID" value="<?= htmlspecialchars($review['ReviewID']) ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>

            <!-- Edit Review Modal -->
            <div class="modal fade" id="editReviewModal<?= $review['ReviewID'] ?>" tabindex="-1" aria-labelledby="editReviewModalLabel<?= $review['ReviewID'] ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="edit-review.php" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editReviewModalLabel<?= $review['ReviewID'] ?>">Edit Review</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="ReviewID" value="<?= htmlspecialchars($review['ReviewID']) ?>">
                                <div class="mb-3">
                                    <label for="ReviewerName" class="form-label">Reviewer Name</label>
                                    <input type="text" class="form-control" name="ReviewerName" value="<?= htmlspecialchars($review['ReviewerName']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ReviewText" class="form-label">Review Text</label>
                                    <textarea class="form-control" name="ReviewText" rows="3" required><?= htmlspecialchars($review['ReviewText']) ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="Rating" class="form-label">Rating</label>
                                    <input type="number" class="form-control" name="Rating" value="<?= htmlspecialchars($review['Rating']) ?>" min="1" max="5" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No reviews available at the moment. Be the first to leave a review!</p>
    <?php endif; ?>
</div>

<!-- Add Review Modal -->
<div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="addReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="add-review.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addReviewModalLabel">Add Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="ReviewerName" class="form-label">Reviewer Name</label>
                        <input type="text" class="form-control" name="ReviewerName" required>
                    </div>
                    <div class="mb-3">
                        <label for="ReviewText" class="form-label">Review Text</label>
                        <textarea class="form-control" name="ReviewText" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Rating" class="form-label">Rating</label>
                        <input type="number" class="form-control" name="Rating" min="1" max="5" required>
                    </div>
                    <div class="mb-3">
                        <label for="ProductID" class="form-label">Product</label>
                        <input type="number" class="form-control" name="ProductID" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Review</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include "view-footer.php"; // Include the footer
?>
