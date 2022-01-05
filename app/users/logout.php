<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we logout users.

unset($_SESSION['user']);

// Destroy session
if (session_destroy()) {
    // Redirecting To Home Page
    header("Location: login.php");
}

// redirect('/');
