<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we update tasks

$list_id = $_POST['list-id'];
$user_id = $_SESSION['user']['user_id'];
$id = ($_POST['task-id']);
$title = $_POST['title'];

//check which attributes have been edited, then update db

if (isset($_POST['task'])) {
    $title = trim($_POST['task']);
    $statement = $database->prepare(
        'UPDATE Tasks SET title = :title
    WHERE user_id = :user_id AND list_id = :list_id AND id = :id'
    );

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}

// description

if (isset($_POST['description'])) {
    $description = trim($_POST['description']);
    $statement = $database->prepare(
        'UPDATE Tasks
    SET description = :description
    WHERE user_id = :user_id AND list_id = :list_id AND id = :id'
    );

    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}
// deadline

if (isset($_POST['deadline'])) {
    $deadline = ($_POST['deadline']);
    $statement = $database->prepare(
        'UPDATE Tasks
    SET deadline = :deadline
    WHERE user_id = :user_id AND list_id = :list_id AND id = :id'
    );

    $statement->bindParam(':deadline', $deadline, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}



back();
