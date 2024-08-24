<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $task = $_POST['task'];

    if (!empty($task)) {
	// add update statement
        $stmt = $conn->prepare("");
        $stmt->bindParam(':task', $task);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } else {
        echo "Task cannot be empty!";
    }
}

header("Location: main.php");
exit();
?>
