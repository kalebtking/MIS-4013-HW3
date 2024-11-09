<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        .product-table {
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .product-header {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .no-products {
            text-align: center;
            color: #888;
            font-style: italic;
        }
    </style>
</head>
<body>

<?php
$pageTitle = "Products";
include "view-header.php";  // This will include the navbar
?>

<h1 class="mb-4 product-header">Our Products</h1>

<div class="row">
  <?php if (!empty($products)): ?>
    <?php foreach ($products as $product): ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($product["ProductName"]); ?></h5>
            <p class="card-text">
              <strong>Material:</strong> <?php echo htmlspecialchars($product["ProductMaterial"]); ?><br>
              <strong>Price:</strong> $<?php echo number_format(htmlspecialchars($product["ProductPrice"]), 2); ?>
            </p>
            <a href="product-details.php?id=<?php echo $product["ProductID"]; ?>" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="col-12">
      <p class="text-center">No products available at the moment. Please check back later.</p>
    </div>
  <?php endif; ?>
</div>

<?php
include "view-footer.php";  // This includes the footer and closing tags
?>

</body>
</html>
