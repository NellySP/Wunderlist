<?php

// In this file we update tasks

declare(strict_types=1);
require __DIR__ . '/../autoload.php';

// Update task

$user_id = $_SESSION['user']['user_id'];
$list_id = $_GET['list_id'];
$task_id = $_GET['task_id'];

if (isset($_POST['task'])) {
    $task = trim($_POST['task']);
    $description = ($_POST['description']);
    $deadline = ($_POST['deadline']);
    $completed = ($_POST['completed']);
    $list_id = ($_POST['list-id']);
    $user_id = $_SESSION['user']['user_id'];

    $statement = $database->prepare('UPDATE Tasks SET title = :title, description = :description, deadline = :deadline');
    $statement->bindParam(':title', $task, PDO::PARAM_STR);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':deadline', $deadline, PDO::PARAM_STR);
    $statement->bindParam(':completed', $completed, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);


    $statement->execute();
    redirect("/single-list.php?list-id=$list_id&list-name=$list_name");
}
