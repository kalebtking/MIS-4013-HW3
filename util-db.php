<?php
function get_db_connection() 
{
    $host = 'homework3db.mysql.database.azure.com';
    $username = 'kalebtking';
    $password = 'sooners!23';
    $db_name = 'homework3db';

    // Establish the connection directly with mysqli_connect
    $conn = mysqli_connect($host, $username, $password, $db_name, 3306);

    if (!$conn) {
        die('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    
    return $conn; // Return the connection object on success
}
?>









