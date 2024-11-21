<?php
require_once("model-reviews.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    deleteReview($_POST["ReviewID"]);
    header("Location: reviews.php?status=deleted");
    exit;
}
?>
