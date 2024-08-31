<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container">
        <h1 class="mt-4 mb-4">To-Do List</h1>
        
        <form action="insert.php" method="POST" class="form-inline mb-4">
            <div class="form-group mr-2">
                <input type="text" name="task" class="form-control" placeholder="Enter a new task" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>

        <?php
        include 'select.php';
        
        if (!empty($tasks)) {
            echo "<ul class='list-group'>";
            foreach ($tasks as $task) {
                echo "<li class='list-group-item d-flex justify-content-between align-items-center'>"
                    . htmlspecialchars($task['task'])
                    . "<span>"
                    . "<a href='#' class='btn btn-sm btn-info mr-2' onclick=\"showEditForm(" . $task['id'] . ", '" . htmlspecialchars(addslashes($task['task'])) . "')\">Edit</a>"
                    . "<a href='delete.php?id=" . $task['id'] . "' class='btn btn-sm btn-danger'>Delete</a>"
                    . "</span>"
                    . "</li>";
                echo "<div id='edit-form-" . $task['id'] . "' class='edit-form mt-2 mb-2'>"
                    . "<form action='update.php' method='POST' class='form-inline'>"
                    . "<input type='hidden' name='id' value='" . $task['id'] . "'>"
                    . "<div class='form-group mr-2'>"
                    . "<input type='text' name='task' class='form-control' value='" . htmlspecialchars($task['task']) . "' required>"
                    . "</div>"
                    . "<button type='submit' class='btn btn-success'>Update Task</button>"
                    . "</form>"
                    . "</div>";
            }
            echo "</ul>";
        } else {
            echo "<p>No tasks available.</p>";
        }
        ?>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
