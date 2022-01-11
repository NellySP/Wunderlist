<?php

declare(strict_types=1);

// In this file we add tasks to list and the database

require __DIR__ . '/../autoload.php';

// Create task

if (isset($_POST['task'])) {
    $task = trim($_POST['task']);
    $description = ($_POST['description']);
    $deadline = ($_POST['deadline']);
    $completed = ($_POST['completed']);
    $list_id = ($_POST['list-id']);
    $user_id = $_SESSION['user']['user_id'];



    if (empty($_POST['task'])) {
        $_SESSION['errors'][] = "Name your task!";
    }
    $statement = $database->prepare('INSERT INTO tasks (user_id, title, description, deadline, completed, list_id) 
    VALUES 
    (:user_id, :title, :description, :deadline, :completed, :list_id)');
    $statement->bindParam(':title', $task, PDO::PARAM_STR);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':deadline', $deadline, PDO::PARAM_STR);
    $statement->bindParam(':completed', $completed, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);


    $statement->execute();
    back();
}
