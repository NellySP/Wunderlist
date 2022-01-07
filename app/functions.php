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

// Function to show profile page only if user is logged in

// function to delete user

// fetch username and assign to variable
