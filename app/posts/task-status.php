<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we update tasks completed status

$user_id = $_SESSION['user']['user_id'];


$isCompleted = isset($_POST['checkbox']);

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $completed = TRUE;

    if ($isCompleted) {
        echo "The task $id is completed.";
    } else {
        echo "The task $id is not completed.";
    }

    // This is where you update the database.

    $statement = $database->prepare('UPDATE TASKS SET completed = :completed WHERE id = :id');
    $statement->bindParam(':comleted', $completed, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}

back();
