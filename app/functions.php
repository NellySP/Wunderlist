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

// Function to fetch users list

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
