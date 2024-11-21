<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $runID = $_POST["RunID"];

    $conn = get_db_connection();

    $stmt = $conn->prepare("DELETE FROM GuidedRuns WHERE RunID = ?");
    $stmt->bind_param("i", $runID);

    if ($stmt->execute()) {
        header("Location: guided-runs.php?status=deleted");
    } else {
        header("Location: guided-runs.php?status=error");
    }

    $stmt->close();
    $conn->close();
}
?>
