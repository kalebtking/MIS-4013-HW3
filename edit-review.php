<?php
require_once("model-reviews.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    editReview($_POST["ReviewID"], $_POST["ReviewerName"], $_POST["ReviewText"], $_POST["Rating"]);
    header("Location: reviews.php?status=edited");
    exit;
}
?>
