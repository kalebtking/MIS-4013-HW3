<?php
function selectProducts() {
    try {
        $conn = get_db_connection();

        if (!$conn) {
            throw new Exception("Failed to connect to the database.");
        }

        // Prepare and execute the PDO query
        $stmt = $conn->prepare("SELECT * FROM Products;");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $conn = null; // Close the PDO connection
        return $result;
    } catch (Exception $e) {
        if ($conn) {
            $conn = null;
        }
        throw $e;
    }
}
?>


