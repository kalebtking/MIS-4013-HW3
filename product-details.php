ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



<?php
// Start the session and include database connection and necessary functions
require_once("util-db.php");

// Check if the ProductID is set in POST
if (!isset($_POST['ProductID'])) {
    echo "No product selected.";
    exit;
}

// Retrieve the ProductID from POST
$productID = intval($_POST['ProductID']);

// Get product details from the database
$conn = get_db_connection();
$stmt = $conn->prepare("SELECT ProductName, ProductMaterial, ProductPrice, ProductDescription FROM Products WHERE ProductID = ?");
$stmt->bind_param("i", $productID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    echo "Product not found.";
    exit;
}

// Close database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['ProductName']); ?> - Product Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($product['ProductName']); ?></h1>
        <p><strong>Material:</strong> <?php echo htmlspecialchars($product['ProductMaterial']); ?></p>
        <p><strong>Price:</strong> $<?php echo number_format($product['ProductPrice'], 2); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($product['ProductDescription']); ?></p>
        <a href="products.php" class="btn btn-secondary">Back to Products</a>
    </div>
</body>
</html>
