<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we update tasks

$task_id = $_GET['task-id'];
$list_id = $_GET['list-id'];
$user_id = $_SESSION['user']['user_id'];

if (isset($_POST['task'])) {
    $title = trim($_POST['task']);
    $description = ($_POST['description']);
    $deadline = ($_POST['deadline']);


    $statement = $database->prepare('UPDATE Tasks SET title = :title, description = :description, deadline = :deadline WHERE id = :task_id');

    $statement->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':deadline', $deadline, PDO::PARAM_STR);

    $statement->execute();
}

redirect('/single_list.php?id=' . $list_id);
