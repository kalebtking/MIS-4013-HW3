
<?php
function selectProducts() {
    try {
        $conn = get_db_connection();

        if (!$conn) {
            throw new Exception("Failed to connect to the database.");
        }

        $conn->query("USE Homework3;");
        $stmt = $conn->prepare("SELECT * FROM Products;");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        if ($conn) {
            $conn->close();
        }
        throw $e;
    }
}
?>

