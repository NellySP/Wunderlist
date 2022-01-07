<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['user_id'])) {
    $user_id = $_SESSION['user']['user_id'];

    $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));


    $query = 'SELECT * FROM users WHERE email = :email';

    $statement = $database->prepare($query);

    $statement->bindParam(':email', $email, PDO::PARAM_STR);

    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (password_verify($_POST['password'], $user['password'])) {
        //delete user
        $statement = $database->prepare("DELETE FROM Users WHERE user_id = :user_id");
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();

        // delete users lists from database
        $statement = $database->prepare("DELETE FROM Lists WHERE user_id = :user_id");
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();

        // delete users tasks from database
        $statement = $database->prepare("DELETE FROM Tasks WHERE user_id = :user_id");
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();

        unset($_SESSION['user']);
    } else {
        $_SESSION['errors'][] = 'Password or email is incorrect. Please try again!';
        redirect('/profile.php');
    }
    redirect('/');
    $_SESSION['errors'][] = 'Your account has been deleted!';
};
