<?php

$dbPath = __DIR__ . '/db_task.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$pdo->exec('CREATE TABLE tasks (
    id INTEGER PRIMARY KEY,
    name TEXT, 
    description TEXT, 
    deadline DATE, 
    priority TEXT, 
    status VARCHAR)');

