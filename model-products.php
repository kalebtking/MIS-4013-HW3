<?php
require_once("util-db.php");

function selectProducts() {
    $conn = get_db_connection();

    try {
        // Execute the query
        $query = "SELECT * FROM Products";
        $stmt = $conn->query($query);
        
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
?>






