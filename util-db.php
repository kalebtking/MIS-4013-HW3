<?php
function get_db_connection(){
    $dsn = "mysql:host=homework3db.mysql.database.azure.com;dbname=homework3db;charset=utf8mb4";
    $username = "kalebtking";
    $password = "sooners!23";

    try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        // Output detailed error information for debugging
        die("Database connection failed: " . $e->getMessage());
    }
}
?>

// <?php
// function get_db_connection(){

//     // Create connection   
//     $conn = new mysqli("homework3db.mysql.database.azure.com", "kalebtking", "sooners!23", "homework3db");

//     // Check connection
//     if ($conn->connect_error) {
//         return false; // Connection failed
//     }
//     return $conn; // Connection successful
// }
// ?>





