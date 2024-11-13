<?php
$pageTitle = "About Us";
include "view-header.php"; // Include header

require_once("model-company.php");

// Get company information from the database
$companyInfo = getCompanyInfo();
?>

<div class="container about-container">
    <h1 class="rubik-glitch-regular">ABOUT <?= htmlspecialchars($companyInfo['CompanyName']) ?></h1>

    <?php if ($companyInfo): ?>
        <p><strong>Mission:</strong> <?= htmlspecialchars($companyInfo['MissionStatement']) ?></p>
        <p><strong>Vision:</strong> <?= htmlspecialchars($companyInfo['Vision']) ?></p>
        <p><strong>History:</strong> <?= nl2br(htmlspecialchars($companyInfo['History'])) ?></p>
        <p><strong>Core Values:</strong> <?= htmlspecialchars($companyInfo['CoreValues']) ?></p>
        <p><strong>Our Team:</strong> <?= nl2br(htmlspecialchars($companyInfo['TeamInfo'])) ?></p>
        <p><strong>Achievements:</strong> <?= htmlspecialchars($companyInfo['Achievements']) ?></p>
        <p>Contact us at <a href="mailto:<?= htmlspecialchars($companyInfo['ContactEmail']) ?>"><?= htmlspecialchars($companyInfo['ContactEmail']) ?></a> or call us at <?= htmlspecialchars($companyInfo['ContactPhone']) ?></p>
    <?php else: ?>
        <p>Company information is not available at the moment.</p>
    <?php endif; ?>
</div>

<?php
include "view-footer.php"; // Include footer
?>
