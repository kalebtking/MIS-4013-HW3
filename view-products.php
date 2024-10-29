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
<?php
while ($product = $products->fetch_assoc()) {
?>
  <tr> 
    <td><?php echo $product["ProductID"]; ?></td>
    <td><?php echo $product["ProductName"]; ?></td>
    <td><?php echo $product["ProductPrice"]; ?></td>
    <td><?php echo $product["ProductMaterial"]; ?></td>
  </tr>
<?php 
}
?>
    </tbody>
  </table>
</div>
