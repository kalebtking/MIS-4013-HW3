// <?php
// function get_db_connection(){
//     // Create connection
//     $conn = new mysqli("homework3db.mysql.database.azure.com", "kalebtking", "sooners!23", "homework3db");
    
//     // Check connection
//     if ($conn->connect_error) {
//       return false;
//     }
//     return $conn;
// }
// ?>
<?php
function get_db_connection(){
    try {
        $conn = new PDO("mysql:host=homework3db.mysql.database.azure.com;dbname=Homework3 DB", "kalebtking", "sooners!23");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        return false;
    }
}
?>


