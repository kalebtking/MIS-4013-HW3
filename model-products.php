<?php
require_once("util-db.php");

function selectProducts() {
    $conn = get_db_connection();
    
    if (!$conn) {
        throw new Exception("Failed to connect to the database.");
    }

    // Execute the query
    $query = "use homework3; select * from products;";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        throw new Exception("Query failed: " . mysqli_error($conn));
    }

    // Fetch all rows as an associative array
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // Check if there are products
    if (empty($products)) {
        echo "No products found in the database.";
    }

    // Free result set and close connection
    mysqli_free_result($result);
    mysqli_close($conn);

    return $products;
}
?>








