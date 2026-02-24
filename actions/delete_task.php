<?php
session_start();
require "../config/database.php";

$task_id = $_POST['task_id'];

$sql = "DELETE FROM tasks WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$task_id]);

header("Location: ../dashboard.php");
exit();
?>