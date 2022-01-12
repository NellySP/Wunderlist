<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we update tasks completed status

$user_id = $_SESSION['user']['user_id'];
$isCompleted = isset($_POST['checkbox']);

if (isset($_POST['id'])) {
    $completed = true;
    $id = $_POST['id'];
    $list_id = $_POST['list'];

    // die(var_dump($_POST));
    // This is where you update the database.

    $statement = $database->prepare('UPDATE Tasks SET completed = :completed WHERE id = :id AND list_id = :list_id');
    $statement->bindParam(':completed', $completed, PDO::PARAM_BOOL);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->execute();

    if ($isCompleted) {
        echo "The task $id is completed.";
    } else {
        echo "The task $id is not completed.";
    }
}
back();
