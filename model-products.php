<?php
require_once("util-db.php");

function selectProducts() {
    
    $conn = get_db_connection();

    if (!$conn) {
        die("Database connection failed.");
    }

    $sql = "select ProductID, ProductName, ProductPrice, ProductMaterial from Products"
    $result = $conn->query($sql);

    $products = [];
    if ($result && $result->num_rows > 0) {
        // Fetch data
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    if ($result) {
        $result->close();
    }

    $conn->close();

    return $products;
}
?>









