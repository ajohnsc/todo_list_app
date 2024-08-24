<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // add Delete statement
    $stmt = $conn->prepare("");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

header("Location: main.php");
exit();
?>
