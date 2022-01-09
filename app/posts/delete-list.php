<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we delete new posts in the database.

// if (isset($_POST['list'])) {
//     $title = trim(filter_var($_POST['list'], FILTER_SANITIZE_STRING));

//     $statement = $database->prepare('DELETE * FROM Lists WHERE title = :title');
//     $statement->bindParam(':title', $title, PDO::PARAM_STR);
//     $statement->execute();
// }

$id = $list['id'];

$statement = $database->prepare('DELETE * FROM Lists WHERE id = :id');
$statement->bindParam(':id', $id, PDO::PARAM_STR);
$statement->execute();

// Delete tasks from within list

$statement = $database->prepare('DELETE FROM tasks WHERE list_id = :list_id;');
$statement->bindParam(':list_id', $id, PDO::PARAM_INT);
$statement->execute();


// lägg till att ta bort alla tasks med list_id 
redirect('/lists.php');
