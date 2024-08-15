<?php

$dbPath = __DIR__ . '/db_task.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$name = $_POST['name'];
$description = $_POST['description'];
$deadline = $_POST['deadline'];
$priority = $_POST['priority'];
$status = $_POST['status'];

$sql = "INSERT INTO tasks (name, description, deadline, priority, status)
        values (?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $description);
$stmt->bindParam(3, $deadline);
$stmt->bindParam(4, $priority);
$stmt->bindParam(5, $status);

$stmt->execute();

header("Location: index.php");

