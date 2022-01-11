<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we update tasks

$task_id = $_GET['task-id'];
$list_id = $_GET['list-id'];
$user_id = $_SESSION['user']['user_id'];

if (isset($_POST['task'])) {
    $title = $_POST['title'];

    $statement = $database->prepare(
        'UPDATE Tasks SET title = :title
    WHERE user_id = :user_id AND list_id = :list_id AND id = :task_id'
    );

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->execute();
}

if (isset($_POST['description'])) {
    $description = $_POST['description'];
    $statement = $database->prepare(
        'UPDATE Tasks
    SET description = :description
    WHERE user_id = :user_id AND list_id = :list_id AND id = :task_id'
    );

    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->execute();
}

if (isset($_POST['deadline'])) {
    $deadline = $_POST['deadline'];
    $statement = $database->prepare(
        'UPDATE tasks
    SET deadline_at = :deadline_at
    WHERE user_id = :user_id AND list_id = :list_id AND id = :task_id'
    );

    $statement->bindParam(':deadline_at', $deadline_at, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->execute();
}

redirect('/single_list.php?id=' . $list_id);
