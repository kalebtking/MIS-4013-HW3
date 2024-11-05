<?php
require_once("util-db.php");

function selectProducts() {
    $conn = get_db_connection();

    if (!$conn) {
        throw new Exception("Failed to connect to the database.");
    }

    // Execute the query
    $query = "SELECT * FROM Products";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        throw new Exception("Query failed: " . mysqli_error($conn));
    }

    // Fetch all rows as an associative array
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // Debug output
    if (empty($products)) {
        echo "Query executed, but no products found.";
    } else {
        echo "Products found: <pre>";
        print_r($products);
        echo "</pre>";
    }

    // Free result set and close connection
    mysqli_free_result($result);
    mysqli_close($conn);

    return $products;
}
?>









