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

    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($conn); // Close the connection after the query
    return $products;
}
?>





