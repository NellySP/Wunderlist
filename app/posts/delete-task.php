<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['task'])) {
    $list_id = $_POST['task'];

    $statement = $database->prepare('DELETE FROM Tasks WHERE list_id = :List_id');
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->execute();
}

redirect("/single-list.php?list-id=$list_id");
