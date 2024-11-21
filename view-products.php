<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<h1 class="mb-4 home-header rubik-glitch-regular">OUR PRODUCTS</h1>

<!-- Add Product Button -->
<div class="mb-4">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>
</div>

<div class="row">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($product["ProductName"]); ?></h5>
                        <p><strong>Material:</strong> <?php echo htmlspecialchars($product["ProductMaterial"]); ?></p>
                        <p><strong>Price:</strong> $<?php echo htmlspecialchars($product["ProductPrice"]); ?></p>
                        <!-- Edit Button -->
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProductModal<?php echo $product["ProductID"]; ?>">Edit</button>
                        <!-- Delete Button -->
                        <form action="delete-product.php" method="post" class="d-inline">
                            <input type="hidden" name="ProductID" value="<?php echo htmlspecialchars($product["ProductID"]); ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Product Modal -->
            <div class="modal fade" id="editProductModal<?php echo $product["ProductID"]; ?>" tabindex="-1" aria-labelledby="editProductModalLabel<?php echo $product["ProductID"]; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="edit-product.php" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProductModalLabel<?php echo $product["ProductID"]; ?>">Edit Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="ProductID" value="<?php echo htmlspecialchars($product["ProductID"]); ?>">
                                <div class="mb-3">
                                    <label for="ProductName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="ProductName" value="<?php echo htmlspecialchars($product["ProductName"]); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ProductMaterial" class="form-label">Product Material</label>
                                    <input type="text" class="form-control" name="ProductMaterial" value="<?php echo htmlspecialchars($product["ProductMaterial"]); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ProductPrice" class="form-label">Price</label>
                                    <input type="number" class="form-control" name="ProductPrice" value="<?php echo htmlspecialchars($product["ProductPrice"]); ?>" step="0.01" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
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

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="add-product.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="ProductName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="ProductName" required>
                    </div>
                    <div class="mb-3">
                        <label for="ProductMaterial" class="form-label">Product Material</label>
                        <input type="text" class="form-control" name="ProductMaterial" required>
                    </div>
                    <div class="mb-3">
                        <label for="ProductPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" name="ProductPrice" step="0.01" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
