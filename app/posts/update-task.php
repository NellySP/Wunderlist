<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we update tasks


$user_id = $_SESSION['user']['user_id'];
$id = ($_POST['task-id']);
$title = $_POST['title'];

// check if title is set, if yes -> set variable

if (isset($_POST['task'])) {
    $title = trim($_POST['task']);
}

// description

if (isset($_POST['description'])) {
    $description = trim($_POST['description']);
}
// deadline

if (isset($_POST['deadline'])) {
    $deadline = ($_POST['deadline']);
}

//check which attributes have been edited, then update db
if ($title) {
    $statement = $database->prepare(
        'UPDATE Tasks SET title = :title
    WHERE user_id = :user_id AND id = :id'
    );

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}

if ($description) {
    $statement = $database->prepare(
        'UPDATE Tasks
    SET description = :description
    WHERE user_id = :user_id AND id = :id'
    );

    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}

if ($deadline) {
    $statement = $database->prepare(
        'UPDATE Tasks
    SET deadline = :deadline
    WHERE user_id = :user_id AND id = :id'
    );

    $statement->bindParam(':deadline', $deadline, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}

back();
