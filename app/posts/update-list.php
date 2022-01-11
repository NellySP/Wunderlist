<?php

// In this file we update lists

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Update list

if (isset($_POST['title'])) {
    $title = trim($_POST['title']);
    $list_id = ($_POST['list-id']);

    $statement = $database->prepare('UPDATE lists SET title = :title WHERE id = :id');

    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':id', $list_id, PDO::PARAM_INT);

    $statement->execute();
};
redirect('/lists.php');
