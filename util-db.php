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
$servername = "homework3db.mysql.database.azure.com";
$username = "kalebtking";
$password = "sooners!23";

try {
  $conn = new PDO("mysql:host=$servername;dbname=homework3db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
