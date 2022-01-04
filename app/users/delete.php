<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_GET['id'])) {
    $user_id = $_SESSION['user']['id'];

    //delete user
    $statement = $database->prepare("DELETE FROM Users WHERE id = :user_id");
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    unset($_SESSION['user']);

    redirect('/');
}
