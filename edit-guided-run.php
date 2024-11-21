<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $runID = $_POST["RunID"];
    $runDate = $_POST["RunDate"];
    $runTime = $_POST["RunTime"];
    $price = $_POST["Price"];
    $description = $_POST["Description"];
    $location = $_POST["Location"];
    $guideID = $_POST["GuideID"];

    $conn = get_db_connection();

    $stmt = $conn->prepare("UPDATE GuidedRuns SET RunDate = ?, RunTime = ?, Price = ?, Description = ?, Location = ?, GuideID = ? WHERE RunID = ?");
    $stmt->bind_param("ssdssii", $runDate, $runTime, $price, $description, $location, $guideID, $runID);

    if ($stmt->execute()) {
        header("Location: guided-runs.php?status=edited");
    } else {
        header("Location: guided-runs.php?status=error");
    }

    $stmt->close();
    $conn->close();
}
?>
