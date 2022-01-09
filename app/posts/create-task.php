<?php

declare(strict_types=1);

// In this file we add lists to the database

require __DIR__ . '/../autoload.php';

// hur placerar jag task under list?????

// Create task

if (isset($_POST['task'])) {
    $task = trim(filter_var($_POST['task'], FILTER_SANITIZE_STRING));
    $description = ($_POST['task-description']);
    $deadline = ($_POST['task-deadline']);
    $completed = ($_POST['task-completed']);
    $list_id = ($_GET['list_id']);
    // ballar ur totalt när jag försöker lägga till user_id. då funkar det inte att lägga till alls?
    // $user_id = $_SESSION['user']['user_id'];



    if (empty($_POST['task'])) {
        $_SESSION['errors'][] = "Name your task!";
    }
    $statement = $database->prepare('INSERT INTO tasks (user_id, title, description, deadline, completed, list_id) 
    VALUES 
    (:user_id, :title, :description, :deadline, :completed, :list_id)');
    $statement->bindParam(':title', $task, PDO::PARAM_STR);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':deadline', $deadline, PDO::PARAM_STR);
    $statement->bindParam(':completed', $completed, PDO::PARAM_STR);
    // $user_id->bindParam(':user_id', $user_id, PDO::PARAM_STR);


    $statement->execute();
}
redirect('/single-list.php');
