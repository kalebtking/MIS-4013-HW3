<?php
require_once("util-db.php");

function getCompanyInfo() {
    $conn = get_db_connection();

    if (!$conn) {
        die("Database connection failed.");
    }

    $sql = "SELECT CompanyName, MissionStatement, Vision, History, CoreValues, TeamInfo, Achievements, ContactEmail, ContactPhone FROM CompanyInfo WHERE CompanyID = 1"; // Adjust the WHERE clause as needed
    $result = $conn->query($sql);

    $companyInfo = null;
    if ($result && $result->num_rows > 0) {
        $companyInfo = $result->fetch_assoc();
    }

    if ($result) {
        $result->close();
    }

    $conn->close();

    return $companyInfo;
}
?>
