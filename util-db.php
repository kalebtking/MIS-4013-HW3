<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('homework3db.mysql.database.azure.com', 'kalebtking', 'sooners!23', 'homework3db');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>








