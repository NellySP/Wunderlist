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
    } elseif ($profile_picture !== null) {
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

function get_tasks($list_id, $database)
{
    $statement = $database->query('SELECT * FROM Tasks WHERE list_id = :list_id;');
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->execute();
    $lists = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $lists;
}
