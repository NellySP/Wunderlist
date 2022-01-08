<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete new posts in the database.

if (isset($_POST['list'])) {
    $title = trim(filter_var($_POST['list'], FILTER_SANITIZE_STRING));

    if (empty($_POST['title'])) {
        $_SESSION['errors'][] = "Give your list a name!";
    }
    $statement = $database->prepare('DELETE * FROM Lists WHERE title = :title');
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->execute();
}
redirect('/lists.php');
