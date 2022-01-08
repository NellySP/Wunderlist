<?php

declare(strict_types=1);

// In this file we add lists to the database

require __DIR__ . '/../autoload.php';

// hur placerar jag task under list?

// Create task

if (isset($_POST['task'])) {
    $task = trim(filter_var($_POST['task'], FILTER_SANITIZE_STRING));
    $user_id = $_SESSION['user']['user_id'];

    if (empty($_POST['task'])) {
        $_SESSION['errors'][] = "Name your task!";
    }
    $statement = $database->prepare('INSERT INTO Tasks
    (user_id, list_id, title)
    VALUES
    (:user_id, :list_id, :title)');
    $statement->bindParam(':title', $task, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_STR);

    $statement->execute();
}
redirect('/lists.php');