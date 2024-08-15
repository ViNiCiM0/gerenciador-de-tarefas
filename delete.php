<?php

$dbPath = __DIR__ . '/db_task.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$id = $_GET['id'];
$deleteTask = 'DELETE FROM tasks WHERE id = ?';

$stmt = $pdo->prepare($deleteTask);
$stmt->bindValue(1, $id);
$stmt->execute([$id]);

header("Location: index.php");