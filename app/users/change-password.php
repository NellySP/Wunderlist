<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// change user password

if (isset($_POST['password'])) {
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_id = $_SESSION['user']['user_id'];

    $statement = $database->prepare('UPDATE Users SET password = :password WHERE user_id = :user_id');

    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

    $statement->execute();
}

back();
