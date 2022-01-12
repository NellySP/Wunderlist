<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

// function to show avatar and if none set, show default avatar

function get_profile_picture()
{
    $profile_picture = $_SESSION['user']['profile_picture'];
    if ($profile_picture === null) {
        return '/default.jpg';
    } else {
        return $profile_picture;
    }
}

// function for display of error-messages

function display_error()
{
    if (isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            unset($_SESSION['errors']);
            return $error;
        }
        unset($_SESSION['errors']);
    }
}

// Function to fetch users lists

function get_lists($user_id, $database)
{
    $statement = $database->query('SELECT * FROM lists WHERE user_id = :user_id;');
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
    $lists = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $lists;
}
// Function to fetch users tasks

function get_tasks(PDO $database, $list_id)
{
    $user_id = $_SESSION['user']['user_id'];

    $statement = $database->prepare("SELECT * FROM tasks WHERE user_id = :user_id AND list_id = :list_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->execute();

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}
// function to get task-name from list-id and task_id

function get_single_task(PDO $database, $id)
{
    $user_id = $_SESSION['user']['user_id'];

    $statement = $database->query('SELECT * FROM Tasks WHERE user_id = :user_id AND id = :id');
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $task = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $task;
}
// function to view all tasks

function get_all_tasks(PDO $database)
{
    $user_id = $_SESSION['user']['user_id'];

    $statement = $database->prepare("SELECT * FROM Tasks WHERE user_id = :user_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
}

// function to view all tasks due today

function tasks_due_today(PDO $database)
{
    $user_id = $_SESSION['user']['user_id'];
    $deadline = date('Y-m-d');

    $statement = $database->prepare("SELECT * FROM Tasks WHERE user_id = :user_id AND deadline = :deadline");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':deadline', $deadline, PDO::PARAM_STR);

    $statement->execute();

    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (isset($tasks)) {
        return $tasks;
    } else {
        echo 'You have no tasks due today!';
    }
}

// function to get list-name from list-id and user_id

function get_single_list(PDO $database, $id)
{
    $user_id = $_SESSION['user']['user_id'];

    $statement = $database->query('SELECT * FROM Lists WHERE user_id = :user_id AND id = :id');
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $list = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $list;
}



// redirect back to the page where the form was posted

function back()
{
    redirect($_SERVER['HTTP_REFERER']);
}

// check if task is completed

function task_status(PDO $database, $id)
{
    $query = 'SELECT completed FROM Tasks WHERE id = :id';

    $statement = $database->prepare($query);

    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();

    $status = $statement->fetch(PDO::FETCH_ASSOC);

    foreach ($status as $state) {
        if ($state == true) {
            echo " completed";
        } else if ($state == false) {
            echo " not completed";
        }
    }
}
