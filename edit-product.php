<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["ProductID"];
    $name = $_POST["ProductName"];
    $material = $_POST["ProductMaterial"];
    $price = $_POST["ProductPrice"];

    $conn = get_db_connection();

    $stmt = $conn->prepare("UPDATE Products SET ProductName = ?, ProductMaterial = ?, ProductPrice = ? WHERE ProductID = ?");
    $stmt->bind_param("ssdi", $name, $material, $price, $id);

    if ($stmt->execute()) {
        header("Location: products.php?status=edited");
    } else {
        header("Location: products.php?status=error");
    }

    $stmt->close();
    $conn->close();
}
?>
