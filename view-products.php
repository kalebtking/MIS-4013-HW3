<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>

<h1 class="mb-4 home-header rubik-glitch-regular">OUR PRODUCTS</h1>

<div class="row">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($product["ProductName"]); ?></h5>
                        <!-- Form for View Details button -->
                        <form action="product-details.php" method="post">
                            <input type="hidden" name="ProductID" value="<?php echo htmlspecialchars($product["ProductID"]); ?>">
                            <button type="submit" class="btn btn-primary">View Details</button>
                        </form>
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


</body>
</html>
