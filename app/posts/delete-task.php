<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete new posts in the database.

if (isset($_POST['task'])) {
    $title = trim(filter_var($_POST['task'], FILTER_SANITIZE_STRING));

    $statement = $database->prepare('DELETE * FROM Taskss WHERE title = :title');
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->execute();
}
redirect('/lists.php');
