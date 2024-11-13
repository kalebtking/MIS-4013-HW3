<?php
$pageTitle = "Guided Runs";
include "view-header.php";
require_once("model-guided-runs.php");

$runs = getGuidedRuns();
?>

<div class="container">
    <h1>Guided Runs</h1>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No guided runs available at the moment.</p>
    <?php endif; ?>
</div>

<?php include "view-footer.php"; ?>
