<?php
function get_db_connection(){
    // Create connection with SSL options
    $conn = new mysqli(
        'homework3db.mysql.database.azure.com', // Host
        'kalebtking', // Username
        'sooners!23', // Password
        'homework3' // Database
    );

    // Set SSL options
    $conn->ssl_set(NULL, NULL, '/Users/kalebking/Desktop/MIS-4013/DigiCertGlobalRootCA.crt.pem', NULL, NULL); // Adjust the path as needed

    // Check connection
    if ($conn->connect_error) {
        return false;
    }

    // Enforce SSL connection
    $conn->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);

    return $conn;
}
?>

