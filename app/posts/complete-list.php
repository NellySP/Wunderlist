<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_GET['list-id'])) {
    echo $_GET['list-id'];

    $completed = true;
    $id = $_POST['id'];
    $list_id = $_GET['list-id'];

    // This is where you update the database.

    $statement = $database->prepare('UPDATE Tasks SET completed = :completed WHERE list_id = :list_id');
    $statement->bindParam(':completed', $completed, PDO::PARAM_BOOL);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->execute();
    back();
}
