<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('138.197.17.168', 'hw3', '1Wolverine0', 'kalebtki_hw3');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>

     
    

