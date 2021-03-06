<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


// In this file we login users.

if (isset($_POST['email'], $_POST['password'])) {
    // start by fetching the values from the $_POST array and save them to
    // their own variables.
    $email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));


    $query = 'SELECT * FROM users WHERE email = :email';

    $statement = $database->prepare($query);

    // Här sätter vi en placeholder för variabeln email.
    // Detta för att man inte får skicka in variabler i sql-queries.

    $statement->bindParam(':email', $email, PDO::PARAM_STR);

    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);


    // if the user does not exist in the session, redirect to login-start-page

    if ($user === false) {
        redirect('/login.php');
    }

    // if the user exist -> verify password

    if (password_verify($_POST['password'], $user['password'])) {
        // If the password was valid we know that the user exists and provided
        // the correct password. We can now save the user in our session.
        // Remember to not save the password in the session!

        $_SESSION['user'] = [
            "user_id" => $user['user_id'],
            "name" => $user['username'],
            "email" => $user['email'],
            "profile_picture" => $user['profile_picture']
        ];
    };

    // if the password is not correct, send error message

    if (!password_verify($_POST['password'], $user['password'])) {
        $_SESSION['errors'][] = 'Password or email is incorrect. Please try again!';
        redirect('/login.php');
    }
    unset($user['password']);
    redirect('/index.php');
}
