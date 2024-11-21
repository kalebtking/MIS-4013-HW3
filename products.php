<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("util-db.php");
require_once("model-products.php");

$pageTitle = "Products";
include "view-header.php";

// Get products from the database
$products = selectProducts();

?>

<?php if (isset($_GET["status"])): ?>
    <div id="notification" class="alert alert-success">
        <?php if ($_GET["status"] === "added") echo "Product added successfully!"; ?>
        <?php if ($_GET["status"] === "edited") echo "Product updated successfully!"; ?>
        <?php if ($_GET["status"] === "deleted") echo "Product deleted successfully!"; ?>
        <?php if ($_GET["status"] === "error") echo "An error occurred. Please try again."; ?>
    </div>
    <script>
        // Hide the notification after 5 seconds
        setTimeout(function() {
            const notification = document.getElementById('notification');
            if (notification) {
                notification.style.transition = "opacity 0.5s ease";
                notification.style.opacity = "0";
                setTimeout(() => notification.remove(), 500); // Fully remove after fading out
            }
        }, 5000); // 5000ms = 5 seconds
    </script>
<?php endif; ?>

<?php
include "view-products.php";
include "view-footer.php";
?>
