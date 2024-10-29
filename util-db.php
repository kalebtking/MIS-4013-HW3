<?php
function get_db_connection() {
    $host = "homework3db.mysql.database.azure.com"; // Your Azure server hostname
    $dbname = "homework3db"; // The name of your database as set in Azure
    $username = "kalebtking"; // The username you use to log in
    $password = "sooners!23"; // The password for the database

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return false;
    }
}
?>



