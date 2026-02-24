<?php
require "includes/auth.php";
require "config/database.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Task Dashboard</h2>
<a href="logout.php">Logout</a>

<h3>Add Task</h3>

<form action="actions/add_task.php" method="POST">
    <input type="text" name="title" placeholder="Task Title" required>
    <textarea name="description" placeholder="Description"></textarea>
    <input type="date" name="due_date">
    <button type="submit">Add Task</button>
</form>

<hr>

<h3>Your Tasks</h3>

<?php
$sql = "SELECT * FROM tasks WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$_SESSION['user_id']]);
$tasks = $stmt->fetchAll();

foreach ($tasks as $task) {
    echo "<div class='task'>";
    echo "<h4>" . htmlspecialchars($task['title']) . "</h4>";
    echo "<p>" . htmlspecialchars($task['description']) . "</p>";
    echo "<p>Status: " . $task['status'] . "</p>";
    echo "<p>Due: " . $task['due_date'] . "</p>";

    echo "
    <form action='actions/update_task.php' method='POST'>
        <input type='hidden' name='task_id' value='{$task['id']}'>
        <select name='status'>
            <option value='Pending'>Pending</option>
            <option value='In Progress'>In Progress</option>
            <option value='Done'>Done</option>
        </select>
        <button type='submit'>Update</button>
    </form>
    ";

    echo "
    <form action='actions/delete_task.php' method='POST'>
        <input type='hidden' name='task_id' value='{$task['id']}'>
        <button type='submit'>Delete</button>
    </form>
    ";

    echo "<hr></div>";
}
?>

</body>
</html>