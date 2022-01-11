<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$task_id = $_GET['task_id'];
$list_id = $_GET['list_id'];
$user_id = $_SESSION['user']['user_id'];


if (isset($_POST['task'])) {
    $id = $_POST['task'];

    $statement = $database->prepare('DELETE FROM Tasks WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->execute();
}
redirect('/single_list.php?id=' . $list_id);
