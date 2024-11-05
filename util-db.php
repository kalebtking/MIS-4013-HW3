<?php
function get_db_connection() {
    $host = 'homework3db.mysql.database.azure.com';
    $username = 'kalebtking';
    $password = 'sooners!23';
    $db_name = 'homework3db';
    $port = 3306;

    // Paths to the SSL certificate
    $ssl_ca = '/Users/kalebking/Desktop/MIS-4013/DigiCertGlobalRootCA.crt.pem'; // Adjust the path if necessary

    // Establish the connection with SSL options
    $conn = mysqli_init();
    mysqli_ssl_set($conn, null, null, $ssl_ca, null, null); // Set SSL options
    mysqli_real_connect($conn, $host, $username, $password, $db_name, $port, null, MYSQLI_CLIENT_SSL);

    // Check for connection errors
    if (mysqli_connect_errno($conn)) {
        die('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    
    return $conn; // Return the secure connection
}
?>

// <?php
// function get_db_connection() {
//     $host = 'homework3db.mysql.database.azure.com';
//     $db_name = 'homework3db';
//     $username = 'kalebtking';
//     $password = 'sooners!23';

//     try {
//         $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $username, $password);
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         return $conn;
//     } catch (PDOException $e) {
//         die("Connection failed: " . $e->getMessage());
//     }
// }
// ?>









