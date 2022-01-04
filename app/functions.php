<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

// Function to show profile page only if user is logged in

// function to delete user

// fetch username and assign to variable 
