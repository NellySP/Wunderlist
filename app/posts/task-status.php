<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we update tasks completed status

$user_id = $_SESSION['user']['user_id'];

if (isset($_POST['id'])) {
    $completed = true;
    $id = $_POST['id'];
    $list_id = $_POST['list'];

    // This is where you update the database.

    $statement = $database->prepare('UPDATE Tasks SET completed = :completed WHERE id = :id AND list_id = :list_id');
    $statement->bindParam(':completed', $completed, PDO::PARAM_BOOL);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->execute();
    back();
} else if (isset($_POST['id-undone'])) {
    $completed = false;
    $id = $_POST['id-undone'];
    $list_id = $_POST['list'];

    $statement = $database->prepare('UPDATE Tasks SET completed = :completed WHERE id = :id AND list_id = :list_id');
    $statement->bindParam(':completed', $completed, PDO::PARAM_BOOL);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->execute();
}
back();
