<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['list'])) {
    $id = $_POST['list'];

    $statement = $database->prepare('DELETE FROM Lists WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->execute();

    // Delete tasks from within list

    $statement = $database->prepare('DELETE FROM Tasks WHERE list_id = :list_id;');
    $statement->bindParam(':list_id', $id, PDO::PARAM_INT);
    $statement->execute();
}

redirect('/lists.php');
