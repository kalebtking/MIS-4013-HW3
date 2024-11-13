<?php
require_once("util-db.php");

// Function to get all guided runs with guide information
function getGuidedRuns() {
    $conn = get_db_connection();

    $sql = "SELECT GuidedRuns.RunID, GuidedRuns.RunDate, GuidedRuns.RunTime, GuidedRuns.Price, GuidedRuns.Description, GuidedRuns.Location, Guides.GuideID, Guides.GuideName 
            FROM GuidedRuns
            JOIN Guides ON GuidedRuns.GuideID = Guides.GuideID
            ORDER BY GuidedRuns.RunDate";
    $result = $conn->query($sql);

    $runs = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $runs[] = $row;
        }
    }
    $result->close();
    $conn->close();

    return $runs;
}

// Function to get details of a specific guide by GuideID
function getGuideDetails($guideID) {
    $conn = get_db_connection();

    $stmt = $conn->prepare("SELECT * FROM Guides WHERE GuideID = ?");
    $stmt->bind_param("i", $guideID);
    $stmt->execute();
    $result = $stmt->get_result();
    $guide = $result->fetch_assoc();

    $stmt->close();
    $conn->close();

    return $guide;
}
?>
