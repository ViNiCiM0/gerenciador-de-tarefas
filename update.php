<?php

$dbPath = __DIR__ . '/db_task.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$name = $_POST['name'];
$description = $_POST['description'];
$deadline = $_POST['deadline'];
$priority = $_POST['priority'];
$status = isset($_POST['status']) ? $_POST['status'] : '';

$updateTask = 'UPDATE tasks SET 
                 name = :name, 
                 description = :description, 
                 deadline = :deadline, 
                 priority = :priority, 
                 status = :status
                 WHERE id = :id';

$stmt = $pdo->prepare($updateTask);

$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':deadline', $deadline);
$stmt->bindParam(':priority', $priority);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();

header("Location: /");