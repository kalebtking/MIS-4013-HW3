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
        .product-table thead {
            background-color: #007bff;
            color: #ffffff;
        }
        .product-table th, .product-table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .product-table tbody tr:hover {
            background-color: #f1f1f1;
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

<h1 class="product-header">Our Products</h1>
<div class="table-responsive">
  <table class="table product-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Material</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
          <tr>
            <td><?php echo htmlspecialchars($product["ProductID"]); ?></td>
            <td><?php echo htmlspecialchars($product["ProductName"]); ?></td>
            <td>$<?php echo number_format(htmlspecialchars($product["ProductPrice"]), 2); ?></td>
            <td><?php echo htmlspecialchars($product["ProductMaterial"]); ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="4" class="no-products">No products available.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</body>
</html>
