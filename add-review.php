<?php
require_once("model-reviews.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    addReview($_POST["ProductID"], $_POST["ReviewerName"], $_POST["ReviewText"], $_POST["Rating"]);
    header("Location: reviews.php?status=added");
    exit;
}
?>
