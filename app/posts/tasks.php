<?php

// In this file we add lists to the database

//  här måste jag hämta använadid/list-id. så nåt i stil med
// fetch user_id from users where email like the one that is inloggad
// fecth list_id where user_id like the one that is inloggad

declare(strict_types=1);

require __DIR__ . '/../autoload.php';
$statement = $database->prepare('INSERT INTO Tasks
    (list_id, title)
    VALUES
    (:user_id, :title');

$statement->bindParam(':title', $title, PDO::PARAM_STR);
$statement->bindParam(':list_id', $user_id, PDO::PARAM_STR);

$statement->execute();
