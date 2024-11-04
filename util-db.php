<?php
function get_db_connection() {
    $host = 'homework3db.mysql.database.azure.com';
    $db_name = 'homework3db';
    $username = 'kalebtking';
    $password = 'sooners!23';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>









