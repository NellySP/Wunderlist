<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';



if (isset($_POST['email'])) {
    $email = trim($_POST['email']);
    $user_id = $_SESSION['user']['user_id'];

    $statement = $database->prepare('UPDATE Users SET email = :email WHERE user_id = :user_id');

    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);

    $statement->execute();
};

redirect('/profile.php');
