<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we update tasks


$list_id = $_POST['list-id'];
$user_id = $_SESSION['user']['user_id'];

// update title

if (isset($_POST['task'])) {
    $title = trim($_POST['task']);
    $description = ($_POST['description']);
    $deadline = ($_POST['deadline']);
    $id = ($_POST['task-id']);


    $statement = $database->prepare('UPDATE Tasks SET title = :title WHERE id = :id');

    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);

    $statement->execute();
    back();
}

// update description

if (isset($_POST['desciption'])) {
    $description = trim($_POST['description']);
    $id = ($_POST['task-id']);


    $statement = $database->prepare('UPDATE Tasks SET description = :description WHERE id = :id');

    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);

    $statement->execute();

    back();
}

// update deadline

if (isset($_POST['deadline'])) {
    $deadline = ($_POST['deadline']);
    $id = ($_POST['task-id']);


    $statement = $database->prepare('UPDATE Tasks SET deadline = :deadline WHERE id = :id');

    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':deadline', $deadline, PDO::PARAM_STR);

    $statement->execute();

    back();
}
