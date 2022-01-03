<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';



// In this file we register a new user.

// values from input
if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // check if email exist in db

    //prepare the statement
    $statement = $database->prepare('SELECT email FROM Users WHERE email = :email');
    //execute the statement
    $statement->execute();
    $checkEmail = $statement->fetch(PDO::FETCH_ASSOC);
    if ($checkEmail !== false) {
        echo "you already have an account!";
        redirect('/register.php');
    }

    // Nu måste jag bara få den att lägga till infon



    // insert query

    $statement = $database->prepare('INSERT INTO Users
    (username, email, password)
    VALUES
    (:username, :email, :password)');

    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);

    $statement->execute();


    redirect('/');
}
