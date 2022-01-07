<?php

// In this file we add lists to the database

// hur placerar jag task under list?

declare(strict_types=1);

// Create task

if (isset($_POST['task'])) {
    $task = trim(filter_var($_POST['task'], FILTER_SANITIZE_STRING));
    $user_id = $_SESSION['user']['user_id'];

    if (empty($_POST['title'])) {
        $_SESSION['errors'][] = "Give your list a name!";
    }
    $statement = $database->prepare('INSERT INTO Lists
    (user_id, list_id, title)
    VALUES
    (:user_id, :list_id, :title)');
    $statement->bindParam(':title', $task, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_STR);

    $statement->execute();
}
redirect('/lists.php');
