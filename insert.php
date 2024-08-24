<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['task'];

    if (!empty($task)) {
	// add insert statement
        $stmt = $conn->prepare("");
        $stmt->bindParam(':task', $task);
        $stmt->execute();
    } else {
        echo "Task cannot be empty!";
    }
}

header("Location: main.php");
exit();
?>
