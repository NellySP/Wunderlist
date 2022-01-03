<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';



// In this file we register a new user.

// require('/app/database/db.php');
// Logik:
// 1: kolla om användare finns (email) om ja - echo "du är redan medlem!"
// 2: om inte? Insert men först - >
// 3: sanitera, validera, hasha och cutta - kolla hur man gör detta.
// 4: om success - grattismeddelande
// 5: om inte - något gick fel

// values from input
if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// chech if email exist in db

$statement = $database->prepare('SELECT email FROM Users WHERE email = :email');
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->execute();
$checkEmail = $statement->fetch(PDO::FETCH_ASSOC);
if ($checkEmail !== false) {
    $_SESSION['errors'][] = "you already have an account!";
}

// $statement->bindParam(':email', $email, PDO::PARAM_STR);
// $statement->bindParam(':user_name', $username, PDO::PARAM_STR);
// $statement->bindParam(':password', $password, PDO::PARAM_STR);

//email to check

//prepare the statement
$statement = $database->prepare("SELECT * FROM Users WHERE email=?");
//execute the statement
$statement->execute([$email]);
//fetch result
$user = $statement->fetch();
if ($user) {
    echo 'you already have an account!';
};

// Fram till hit fungerar det faktiskt!!!! inte nu längre

// Nu måste jag bara få den att lägga till infon

$sql = "INSERT INTO users (user_name, email, password) VALUES (:user_name,
:email, :password)";

// insert query


// redirect('/');
