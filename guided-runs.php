<?php
$pageTitle = "Guided Runs";
include "view-header.php";
require_once("model-guided-runs.php");

// Fetch guided runs and guides
$runs = getGuidedRuns();
$guides = getAllGuides(); // Function to fetch all guides for the dropdown
?>

<div class="container">
    <h1 class="home-header rubik-glitch-regular">GUIDED RUNS</h1>

    <!-- Add Guided Run Button -->
    <div class="mb-4">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRunModal">Add Guided Run</button>
    </div>

    <?php if (!empty($runs)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Guide</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($runs as $run): ?>
                    <tr>
                        <td><?= htmlspecialchars($run['RunDate']) ?></td>
                        <td><?= htmlspecialchars($run['RunTime']) ?></td>
                        <td>$<?= number_format($run['Price'], 2) ?></td>
                        <td><?= htmlspecialchars($run['Description']) ?></td>
                        <td><?= htmlspecialchars($run['Location']) ?></td>
                        <td><a href="guide-details.php?id=<?= $run['GuideID'] ?>"><?= htmlspecialchars($run['GuideName']) ?></a></td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editRunModal<?= $run['RunID'] ?>">Edit</button>
                            <!-- Delete Form -->
                            <form action="delete-guided-run.php" method="post" class="d-inline">
                                <input type="hidden" name="RunID" value="<?= htmlspecialchars($run['RunID']) ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Guided Run Modal -->
                    <div class="modal fade" id="editRunModal<?= $run['RunID'] ?>" tabindex="-1" aria-labelledby="editRunModalLabel<?= $run['RunID'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="edit-guided-run.php" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editRunModalLabel<?= $run['RunID'] ?>">Edit Guided Run</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="RunID" value="<?= htmlspecialchars($run['RunID']) ?>">
                                        <div class="mb-3">
                                            <label for="RunDate" class="form-label">Date</label>
                                            <input type="date" class="form-control" name="RunDate" value="<?= htmlspecialchars($run['RunDate']) ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="RunTime" class="form-label">Time</label>
                                            <input type="time" class="form-control" name="RunTime" value="<?= htmlspecialchars($run['RunTime']) ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Price" class="form-label">Price</label>
                                            <input type="number" class="form-control" name="Price" value="<?= htmlspecialchars($run['Price']) ?>" step="0.01" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Description" class="form-label">Description</label>
                                            <textarea class="form-control" name="Description" rows="3" required><?= htmlspecialchars($run['Description']) ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="Location" class="form-label">Location</label>
                                            <input type="text" class="form-control" name="Location" value="<?= htmlspecialchars($run['Location']) ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="GuideID" class="form-label">Guide</label>
                                            <select class="form-select" name="GuideID" required>
                                                <?php foreach ($guides as $guide): ?>
                                                    <option value="<?= htmlspecialchars($guide['GuideID']) ?>" <?= $run['GuideID'] == $guide['GuideID'] ? 'selected' : '' ?>>
                                                        <?= htmlspecialchars($guide['GuideName']) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
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
            </tbody>
        </table>
    <?php else: ?>
        <p>No guided runs available at the moment.</p>
    <?php endif; ?>
</div>

<!-- Add Guided Run Modal -->
<div class="modal fade" id="addRunModal" tabindex="-1" aria-labelledby="addRunModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="add-guided-run.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRunModalLabel">Add Guided Run</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="RunDate" class="form-label">Date</label>
                        <input type="date" class="form-control" name="RunDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="RunTime" class="form-label">Time</label>
                        <input type="time" class="form-control" name="RunTime" required>
                    </div>
                    <div class="mb-3">
                        <label for="Price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="Price" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <textarea class="form-control" name="Description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Location" class="form-label">Location</label>
                        <input type="text" class="form-control" name="Location" required>
                    </div>
                    <div class="mb-3">
                        <label for="GuideID" class="form-label">Guide</label>
                        <select class="form-select" name="GuideID" required>
                            <?php foreach ($guides as $guide): ?>
                                <option value="<?= htmlspecialchars($guide['GuideID']) ?>"><?= htmlspecialchars($guide['GuideName']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Guided Run</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "view-footer.php"; ?>
