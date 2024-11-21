<?php
require_once("util-db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["ProductID"];

    $conn = get_db_connection();

    $stmt = $conn->prepare("DELETE FROM Products WHERE ProductID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: products.php?status=deleted");
    } else {
        header("Location: products.php?status=error");
    }

    $stmt->close();
    $conn->close();
}
?>
