<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['list']['title'])) {
    $id = $_POST['list']['id'];

    $statement = $database->prepare('DELETE * FROM Lists WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->execute();

    // Delete tasks from within list

    $statement = $database->prepare('DELETE FROM tasks WHERE list_id = :list_id;');
    $statement->bindParam(':list_id', $id, PDO::PARAM_INT);
    $statement->execute();
}


// lägg till att ta bort alla tasks med list_id 
redirect('/lists.php');
