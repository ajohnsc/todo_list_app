<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <style>
        .edit-form {
            display: none;
        }
        .edit-form.active {
            display: block;
        }
    </style>
    <script>
        function showEditForm(id, task) {
            var forms = document.getElementsByClassName("edit-form");
            for (var i = 0; i < forms.length; i++) {
                forms[i].classList.remove("active");
            }

            var form = document.getElementById("edit-form-" + id);
            form.classList.add("active");
            form.task.value = task;
        }
    </script>
</head>
<body>
    <h1>To-Do List</h1>
    
    <form action="insert.php" method="POST">
        <input type="text" name="task" placeholder="Enter a new task">
        <input type="submit" value="Add Task">
    </form>

    <?php
    include 'select.php';
    
    if (!empty($tasks)) {
        echo "<ul>";
        foreach ($tasks as $task) {
            echo "<li>"
                . htmlspecialchars($task['task'])
                . " <a href='delete.php?id=" . $task['id'] . "'>Delete</a>"
                . " <a href='#' onclick=\"showEditForm(" . $task['id'] . ", '" . htmlspecialchars(addslashes($task['task'])) . "')\">Edit</a>"
                . "</li>";
            echo "<div id='edit-form-" . $task['id'] . "' class='edit-form'>"
                . "<form action='update.php' method='POST'>"
                . "<input type='hidden' name='id' value='" . $task['id'] . "'>"
                . "<input type='text' name='task' value='" . htmlspecialchars($task['task']) . "'>"
                . "<input type='submit' value='Update Task'>"
                . "</form>"
                . "</div>";
        }
        echo "</ul>";
    } else {
        echo "<p>No tasks available.</p>";
    }
    ?>
</body>
</html>
