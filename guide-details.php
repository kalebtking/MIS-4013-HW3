<?php
$pageTitle = "Guide Details";
include "view-header.php";
require_once("model-guided-runs.php");

$guideID = isset($_GET['id']) ? intval($_GET['id']) : 0;
$guide = getGuideDetails($guideID);
?>

<div class="container">
    <?php if ($guide): ?>
        <h1><?= htmlspecialchars($guide['GuideName']) ?></h1>
        <p><strong>Bio:</strong> <?= htmlspecialchars($guide['Bio']) ?></p>
        <p><strong>Experience:</strong> <?= htmlspecialchars($guide['ExperienceYears']) ?> years</p>
        <p><strong>Certifications:</strong> <?= htmlspecialchars($guide['Certifications']) ?></p>
        <p><strong>Contact Email:</strong> <a href="mailto:<?= htmlspecialchars($guide['ContactEmail']) ?>"><?= htmlspecialchars($guide['ContactEmail']) ?></a></p>
    <?php else: ?>
        <p>Guide information is not available.</p>
    <?php endif;
