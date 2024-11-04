// <?php
// require_once("util-db.php");

// function selectProducts() {
//     try {
//         $conn = get_db_connection();

//         if (!$conn) {
//             throw new Exception("Failed to connect to the database.");
//         }

//         // Execute the query
//         $query = "SELECT * FROM Products";
//         $stmt = $conn->query($query);

//         if (!$stmt) {
//             throw new Exception("Query failed: " . $conn->error);
//         }

//         $result = $stmt->fetch_all(MYSQLI_ASSOC);
//         $conn->close();
//         return $result;
//     } catch (Exception $e) {
//         if ($conn) {
//             $conn->close();
//         }
//         throw $e;
//     }
// }
// ?>
<?php
require_once("util-db.php");

function selectProducts() {
    try {
        $conn = get_db_connection();

        if (!$conn) {
            throw new Exception("Failed to connect to the database.");
        }

        // Execute the query
        $query = "SELECT * FROM Products";
        $stmt = $conn->query($query);
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $e) {
        throw $e;
    }
}
?>




