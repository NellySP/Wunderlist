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
$email = $_POST['email'];
$full_name =  $_POST['username'];
$password = $_POST['password'];

//email to check

//prepare the statement
$stmt = $database->prepare("SELECT * FROM Users WHERE email=?");
//execute the statement
$stmt->execute([$email]);
//fetch result
$user = $stmt->fetch();
if ($user) {
    echo 'you already have an account!';
} else {
    echo "email does not exist";
}

// Fram till hit fungerar det faktiskt!!!!

// Nu måste jag bara få den att lägga till infon

$sql = "INSERT INTO users VALUES ('$full_name',
'$email', '$password')";

// insert query


// redirect('/');
