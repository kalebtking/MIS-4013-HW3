<?php
require_once("util-db.php");

if (!isset($_POST['ProductID'])) {
    echo "No product selected.";
    exit;
}

$productID = intval($_POST['ProductID']);

$conn = get_db_connection();
$stmt = $conn->prepare("SELECT ProductName, ProductMaterial, ProductPrice FROM Products WHERE ProductID = ?");
$stmt->bind_param("i", $productID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    echo "Product not found.";
    exit;
}

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
        <a href="products.php" class="btn btn-secondary">Back to Products</a>
    </div>
</body>
</html>
