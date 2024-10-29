<?php
require_once("util-db.php");
require_once("model-products.php");

$pageTitle = "Products";
include "view-header.php";
include "view-footer.php";
$products = selectProducts();
include "view-products.php";
?>
