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

    function addReview($productID, $reviewerName, $reviewText, $rating) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("INSERT INTO Reviews (ProductID, ReviewerName, ReviewText, Rating, ReviewDate) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("issi", $productID, $reviewerName, $reviewText, $rating);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function editReview($reviewID, $reviewerName, $reviewText, $rating) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("UPDATE Reviews SET ReviewerName = ?, ReviewText = ?, Rating = ? WHERE ReviewID = ?");
    $stmt->bind_param("ssii", $reviewerName, $reviewText, $rating, $reviewID);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function deleteReview($reviewID) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("DELETE FROM Reviews WHERE ReviewID = ?");
    $stmt->bind_param("i", $reviewID);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

}
?>
