<?php
function get_db_connection() 
{
    $host = 'homework3db.mysql.database.azure.com';
    $username = 'kalebtking';
    $password = 'sooners!23';
    $db_name = 'homework3db';

    //Establishes the connection
    $conn = mysqli_init();
    mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
    if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: '.mysqli_connect_error());
        {   
?>

// <?php
// function get_db_connection(){
//     $dsn = "mysql:host=homework3db.mysql.database.azure.com;dbname=homework3db;charset=utf8mb4";
//     $username = "kalebtking";
//     $password = "sooners!23";

//     try {
//         $conn = new PDO($dsn, $username, $password);
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         return $conn;
//     } catch (PDOException $e) {
//         // Output detailed error information for debugging
//         die("Database connection failed: " . $e->getMessage());
//     }
// }
// ?>

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





