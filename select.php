<?php
include 'db.php';
// add select statement
$stmt = $conn->prepare("");
$stmt->execute();

$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
