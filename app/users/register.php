<?php

// In this file we register a new user.

// ATT GÖRA:
// 1. kolla unikt användarnamn. ish samma som mejlkollen. eller behövs det? kanske inte eftersom man inte interagerar med andra användare faktiskt.
// 2. kommunicera med användaren. istället för att eka på en helt ny sida.
// 3. emejlfunktions? implemiteras här?

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// trim and hash values from form input

if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
}

// check if email exist in db

//prepare the statement

$statement = $database->prepare('SELECT * FROM users WHERE email = :email');
$statement->bindParam(':email', $email, PDO::PARAM_STR);

//execute the statement

$statement->execute();
$checkEmail = $statement->fetch(PDO::FETCH_ASSOC);
if ($checkEmail !== false) {
    $_SESSION['errors'][] = "This email is already registered!";
    redirect('/register.php');
}
// check if email and name is filled in
if ($email === '') {
    $_SESSION['errors'][] = 'Please fill in your email!';
    redirect('/register.php');
}
if ($name === '') {
    $_SESSION['errors'][] = 'Please fill in your username!';
    redirect('/register.php');
}
//Check if password is given
if ($_POST['password'] === '') {
    $_SESSION['errors'][] = 'You must enter a password as well!';
    redirect('/register.php');
} elseif ($checkEmail === false) {

    // insert new user in to db

    $statement = $database->prepare('INSERT INTO Users
    (username, email, password)
    VALUES
    (:username, :email, :password)');

    // varför är password i blått ovan? Det är skumt.

    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':password', $hashed_password, PDO::PARAM_STR);

    $statement->execute();

    // redirect user to index page

    redirect('/login.php');
}
