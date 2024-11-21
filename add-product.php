<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["ProductName"];
    $material = $_POST["ProductMaterial"];
    $price = $_POST["ProductPrice"];

    $conn = get_db_connection();

    $stmt = $conn->prepare("INSERT INTO Products (ProductName, ProductMaterial, ProductPrice) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $name, $material, $price);

    if ($stmt->execute()) {
        header("Location: products.php?status=added");
    } else {
        header("Location: products.php?status=error");
    }

    $stmt->close();
    $conn->close();
}
?>
