<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// In this file we register a new user.

require('db.php');
session_start();
// When form submitted, check and create user session.

require('/app/database/db.php');
// Logik:
// 1: kolla om användare finns (email) om ja - echo "du är redan medlem!"
// 2: om inte? Insert men först - >
// 3: sanitera, validera, hasha och cutta
// 4: om success - grattismeddelande
// 5: om inte - något gick fel

//email to check
$email = "det som skickats in? hur kollar jag det nu igen";
//prepare the statement
$stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
//execute the statement
$stmt->execute([$email]);
//fetch result
$user = $stmt->fetch();
if ($user) {
    echo 'you already have an account!';
} else {
    echo "email does not exist";
}


redirect('/');
