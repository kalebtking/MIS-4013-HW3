// <?php
// require_once("util-db.php");
// require_once("model-products.php");

// $pageTitle = "Products";
// include "view-header.php";
// include "view-footer.php";

// // Get products from the database
// $products = selectProducts();
// include "view-products.php";
// ?>
<?php
require_once("util-db.php");
require_once("model-products.php");

$pageTitle = "Products";
include "view-header.php";
include "view-footer.php";

// Get products from the database
$products = selectProducts();
include "view-products.php";
?>


