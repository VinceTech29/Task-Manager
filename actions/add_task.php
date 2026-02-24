<?php
session_start();
require "../config/database.php";

$title = $_POST['title'];
$description = $_POST['description'];
$due_date = $_POST['due_date'];
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO tasks (user_id, title, description, due_date) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$user_id, $title, $description, $due_date]);

header("Location: ../dashboard.php");
exit();
?>