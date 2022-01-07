<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we change username!

if (isset($_POST['username'])) {
    $email = trim($_POST['username']);
    $user_id = $_SESSION['user']['user_id'];

    $statement = $database->prepare('UPDATE Users SET username = :username WHERE user_id = :user_id');

    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':username', $email, PDO::PARAM_STR);

    $statement->execute();
    redirect('/profile.php');
};
