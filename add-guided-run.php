<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $runDate = $_POST["RunDate"];
    $runTime = $_POST["RunTime"];
    $price = $_POST["Price"];
    $description = $_POST["Description"];
    $location = $_POST["Location"];
    $guideID = $_POST["GuideID"];

    $conn = get_db_connection();

    $stmt = $conn->prepare("INSERT INTO GuidedRuns (RunDate, RunTime, Price, Description, Location, GuideID) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdssi", $runDate, $runTime, $price, $description, $location, $guideID);

    if ($stmt->execute()) {
        header("Location: guided-runs.php?status=added");
    } else {
        header("Location: guided-runs.php?status=error");
    }

    $stmt->close();
    $conn->close();
}
?>
