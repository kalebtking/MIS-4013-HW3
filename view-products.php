<h1>Products</h1>
<div class="table-responsive">
  <table class="table">
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
            <td><?php echo htmlspecialchars($product["ProductPrice"]); ?></td>
            <td><?php echo htmlspecialchars($product["ProductMaterial"]); ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="4">No products available.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>



