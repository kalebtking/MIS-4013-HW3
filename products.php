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

include "view-products.php";
include "view-footer.php";
?>

<?php if (isset($_GET["status"])): ?>
    <div class="alert alert-success">
        <?php if ($_GET["status"] === "added") echo "Product added successfully!"; ?>
        <?php if ($_GET["status"] === "edited") echo "Product updated successfully!"; ?>
        <?php if ($_GET["status"] === "deleted") echo "Product deleted successfully!"; ?>
        <?php if ($_GET["status"] === "error") echo "An error occurred. Please try again."; ?>
    </div>
<?php endif; ?>


