<?php
session_start();
require "../config/database.php";

$status = $_POST['status'];
$task_id = $_POST['task_id'];

$sql = "UPDATE tasks SET status = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$status, $task_id]);

header("Location: ../dashboard.php");
exit();
?>