<?php
require_once("util-db.php");

$conn = get_db_connection();

if ($conn) {
    echo "Database connection successful.<br>";
} else {
    die("Database connection failed: " . mysqli_connect_error());
}

mysqli_close($conn);
require_once("model-products.php");

$pageTitle = "Products";
include "view-header.php";

// Get products from the database
$products = selectProducts();

// Check if $products has data
if (empty($products)) {
    echo "No products found or error fetching products.";
} else {
    echo "<pre>";
    print_r($products); // Output the products array to confirm data
    echo "</pre>";
}

include "view-products.php";
include "view-footer.php";
?>

// <?php
// require_once("util-db.php");
// require_once("model-products.php");

// $pageTitle = "Products";
// include "view-header.php";

// // Get products from the database
// $products = selectProducts();

// // Debug: Check if $products has data
// if (empty($products)) {
//     echo "No products found or error fetching products.";
// } else {
//     echo "<pre>";
//     print_r($products);
//     echo "</pre>";
// }

// include "view-products.php";
// include "view-footer.php";
// ?>



