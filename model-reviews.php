<?php
require_once("util-db.php");

function selectReviews() {
    $conn = get_db_connection();

    if (!$conn) {
        die("Database connection failed.");
    }

    $sql = "SELECT ReviewID, ProductID, ReviewerName, ReviewText, Rating, ReviewDate FROM Reviews ORDER BY ReviewDate DESC";
    $result = $conn->query($sql);

    $reviews = [];
    if ($result && $result->num_rows > 0) {
        // Fetch data
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }
    }

    if ($result) {
        $result->close();
    }

    $conn->close();

    return $reviews;
}
?>
