<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli("68.97.148.199", "kalebtking", "sooners!23", "Homework3 DB");
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>
